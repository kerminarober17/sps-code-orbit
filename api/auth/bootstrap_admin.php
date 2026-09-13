<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/helpers.php';
require_once __DIR__ . '/../../includes/response.php';
require_post_method();

// Security: In a real production environment, you might protect this via a CLI command, 
// a hardcoded bootstrap secret, or remove the file entirely after first use.
// We will allow it ONLY if there are NO admin accounts in the database.

try {
    $db = get_db_connection();
    
    // Check if any admin exists
    $stmt = $db->query("SELECT id FROM profiles WHERE role = 'admin' LIMIT 1");
    if ($stmt->fetch()) {
        error_response('An admin account already exists. Bootstrap disabled.', 403);
    }
    
    $data = get_json_request();
    $full_name = trim($data['full_name'] ?? 'System Administrator');
    $username = trim($data['username'] ?? 'admin');
    $password = $data['password'] ?? 'admin123';
    
    $id = generate_uuid_v4();
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $role = 'admin';
    
    $insert_stmt = $db->prepare("
        INSERT INTO profiles (id, username, password_hash, full_name, role)
        VALUES (?, ?, ?, ?, ?)
    ");
    
    $insert_stmt->execute([$id, $username, $password_hash, $full_name, $role]);
    
    success_response([
        'message' => 'Initial admin account created successfully.',
        'username' => $username,
        'warning' => 'Please remove this endpoint or change the password immediately in production.'
    ], 201);

} catch (Exception $e) {
    error_response('Database error during admin bootstrap', 500);
}
