<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/helpers.php';
require_once __DIR__ . '/../../includes/response.php';
require_once __DIR__ . '/../../middleware/auth.php';

require_post_method();

$data = get_json_request();

$full_name = trim($data['full_name'] ?? '');
$username = trim($data['username'] ?? '');
$password = $data['password'] ?? '';
$password_confirm = $data['password_confirm'] ?? '';
$academic_level = trim($data['academic_level'] ?? $data['academic_group'] ?? '');
$grade_input = trim($data['grade'] ?? $data['grade_id'] ?? '');
$class_input = trim($data['class_section'] ?? $data['class'] ?? $data['class_id'] ?? '');

// Validation
if (empty($full_name)) error_response('Full name is required', 400);
if (strlen($full_name) > 100) error_response('Full name must not exceed 100 characters', 400);

if (empty($username)) error_response('Username is required', 400);
if (strlen($username) < 3) error_response('Username must be at least 3 characters', 400);
if (strlen($username) > 50) error_response('Username must not exceed 50 characters', 400);
if (!preg_match('/^[a-zA-Z0-9_.-]+$/', $username)) {
    error_response('Username can only contain letters, numbers, underscores, dots, and hyphens', 400);
}

if (empty($password)) error_response('Password is required', 400);
if (strlen($password) < 6) error_response('Password must be at least 6 characters', 400);
if (strlen($password) > 128) error_response('Password must not exceed 128 characters', 400);
if ($password !== $password_confirm) error_response('Passwords do not match', 400);
if (empty($grade_input)) error_response('Grade is required', 400);
if (empty($class_input)) error_response('Class / Section is required', 400);

try {
    $db = get_db_connection();
    $db->beginTransaction();

    // 1. Resolve Academic Group
    $academic_group_id = null;
    if (!empty($academic_level)) {
        // Try by ID
        $stmt = $db->prepare("SELECT id FROM academic_groups WHERE id = ?");
        $stmt->execute([$academic_level]);
        $ag_row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($ag_row) {
            $academic_group_id = $ag_row['id'];
        } else {
            // Try by exact or normalized name
            $alt_ag_name = str_replace([' & ', ' and '], '-', $academic_level);
            $stmt = $db->prepare("SELECT id FROM academic_groups WHERE LOWER(name) = LOWER(?) OR LOWER(name) = LOWER(?)");
            $stmt->execute([$academic_level, $alt_ag_name]);
            $ag_row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($ag_row) {
                $academic_group_id = $ag_row['id'];
            } else {
                // Try fuzzy alphanumeric match
                $normTarget = strtolower(preg_replace('/[^a-z0-9]/', '', $academic_level));
                $all_ag = $db->query("SELECT id, name FROM academic_groups")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($all_ag as $ag_item) {
                    $normG = strtolower(preg_replace('/[^a-z0-9]/', '', $ag_item['name']));
                    if ($normG === $normTarget) {
                        $academic_group_id = $ag_item['id'];
                        break;
                    }
                }
            }
        }

        // If still not found, auto-create academic group
        if (!$academic_group_id) {
            $academic_group_id = generate_uuid_v4();
            $ins_ag = $db->prepare("INSERT INTO academic_groups (id, name, description) VALUES (?, ?, ?)");
            $ins_ag->execute([$academic_group_id, $academic_level, 'Academic tier: ' . $academic_level]);
        }
    }

    // 2. Resolve Grade
    $grade = null;
    // Try by direct ID
    $stmt = $db->prepare("SELECT id, academic_group_id, name FROM grades WHERE id = ?");
    $stmt->execute([$grade_input]);
    $grade = $stmt->fetch(PDO::FETCH_ASSOC);

    // If not found by ID, try exact name match
    if (!$grade) {
        $stmt = $db->prepare("SELECT id, academic_group_id, name FROM grades WHERE LOWER(name) = LOWER(?) LIMIT 1");
        $stmt->execute([$grade_input]);
        $grade = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // If not found by exact name, try alias mapping (e.g. "Sec 1" -> "Secondary 1", "Prep 1" -> "Preparatory 1")
    if (!$grade) {
        $grade_alias = str_replace(['Sec ', 'Prep '], ['Secondary ', 'Preparatory '], $grade_input);
        $stmt = $db->prepare("SELECT id, academic_group_id, name FROM grades WHERE LOWER(name) = LOWER(?) OR name LIKE ? OR name LIKE ? LIMIT 1");
        $stmt->execute([$grade_alias, '%' . $grade_input . '%', '%' . $grade_alias . '%']);
        $grade = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // If still not found, create the grade record automatically under the resolved academic group
    if (!$grade) {
        if (!$academic_group_id) {
            $ag_fallback = $db->query("SELECT id FROM academic_groups ORDER BY created_at ASC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
            $academic_group_id = $ag_fallback ? $ag_fallback['id'] : generate_uuid_v4();
            if (!$ag_fallback) {
                $db->prepare("INSERT INTO academic_groups (id, name, description) VALUES (?, 'General', 'General Academic Group')")
                   ->execute([$academic_group_id]);
            }
        }

        $new_grade_id = generate_uuid_v4();
        preg_match('/\d+/', $grade_input, $matches);
        $level_num = !empty($matches[0]) ? (int)$matches[0] : 1;
        if (strpos(strtolower($grade_input), 'prep') !== false) $level_num += 6;
        if (strpos(strtolower($grade_input), 'sec') !== false) $level_num += 9;

        $ins_g = $db->prepare("INSERT INTO grades (id, academic_group_id, name, level) VALUES (?, ?, ?, ?)");
        $ins_g->execute([$new_grade_id, $academic_group_id, $grade_input, $level_num]);

        $grade = [
            'id' => $new_grade_id,
            'academic_group_id' => $academic_group_id,
            'name' => $grade_input
        ];
    }

    $grade_id = $grade['id'];
    $grade_name = $grade['name'];

    // 3. Resolve Class / Section
    $class_id = null;
    // Try by direct class ID
    $stmt = $db->prepare("SELECT id, name FROM classes WHERE id = ? AND grade_id = ?");
    $stmt->execute([$class_input, $grade_id]);
    $found_class = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($found_class) {
        $class_id = $found_class['id'];
    } else {
        $clean_section = trim(str_ireplace('section', '', $class_input));
        $stmt = $db->prepare("
            SELECT id, name FROM classes 
            WHERE grade_id = ? AND (
                LOWER(name) = LOWER(?) 
                OR LOWER(name) = LOWER(?) 
                OR name LIKE ? 
                OR name LIKE ?
            ) LIMIT 1
        ");
        $stmt->execute([
            $grade_id, 
            $class_input, 
            $clean_section, 
            '% - ' . $clean_section, 
            '% ' . $clean_section
        ]);
        $found_class = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($found_class) {
            $class_id = $found_class['id'];
        } else {
            // Auto-create section for this grade
            $class_id = generate_uuid_v4();
            $new_class_name = "Class " . $grade_name . " - " . ($clean_section ?: $class_input);
            $ins_cl = $db->prepare("INSERT INTO classes (id, grade_id, name) VALUES (?, ?, ?)");
            $ins_cl->execute([$class_id, $grade_id, $new_class_name]);
        }
    }

    // 3. Check if username is taken (case-insensitive)
    $stmt = $db->prepare("SELECT id FROM profiles WHERE LOWER(username) = LOWER(?)");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        error_response('Username is already taken. Please choose another.', 400);
    }

    // 4. Create student profile
    $id = generate_uuid_v4();
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $role = 'student'; // Force student role for public signup

    $insert_stmt = $db->prepare("
        INSERT INTO profiles (id, username, password_hash, full_name, role, class_id)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    $insert_stmt->execute([$id, $username, $password_hash, $full_name, $role, $class_id]);

    // 5. Initialize student gamification row
    $gam_id = generate_uuid_v4();
    $gam_stmt = $db->prepare("
        INSERT INTO student_gamification (id, user_id, total_xp, current_streak, longest_streak, last_activity_date)
        VALUES (?, ?, 0, 0, 0, NULL)
    ");
    $gam_stmt->execute([$gam_id, $id]);

    // 6. Registration complete (automatic enrollment removed)
    $db->commit();

    // 7. Log the student in automatically via session
    session_regenerate_id(true);
    $_SESSION['user_id'] = $id;
    $_SESSION['username'] = $username;
    $_SESSION['full_name'] = $full_name;
    $_SESSION['role'] = $role;
    $_SESSION['class_id'] = $class_id;
    $_SESSION['avatar_url'] = null;
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    success_response([
        'message' => 'Registration successful',
        'user' => [
            'id' => $id,
            'username' => $username,
            'full_name' => $full_name,
            'role' => $role,
            'class_id' => $class_id,
            'avatar_url' => null
        ],
        'csrf_token' => $_SESSION['csrf_token']
    ], 201);

} catch (PDOException $e) {
    if (isset($db) && $db->inTransaction()) {
        $db->rollBack();
    }
    error_log('Signup DB Error: ' . $e->getMessage());
    error_response('Database error during registration. Please try again.', 500);
} catch (Exception $e) {
    if (isset($db) && $db->inTransaction()) {
        $db->rollBack();
    }
    error_log('Signup Server Error: ' . $e->getMessage());
    error_response('Server error during registration. Please try again.', 500);
}


