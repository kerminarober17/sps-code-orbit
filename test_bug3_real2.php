<?php
$_SERVER['REQUEST_METHOD'] = 'GET';
require 'config/database.php';
$db = get_db_connection();

session_start();
$uid = 'test-student-202';
$_SESSION['user_id'] = $uid;
$_SESSION['role'] = 'student';

// complete lessons
$db->exec("INSERT IGNORE INTO profiles (id, username, password_hash, full_name, email, role) VALUES ('$uid', 'user202', 'h', 'T', 't@e.com', 'student')");
$db->exec("INSERT IGNORE INTO lesson_progress (id, user_id, lesson_id, status) SELECT UUID(), '$uid', id, 'completed' FROM lessons WHERE chapter_id='chap-web-01'");
$db->exec("INSERT INTO exam_attempts (id, user_id, exam_id, score, passed, started_at, completed_at) VALUES (UUID(), '$uid', 'exam-chap-web-01', 75, 1, NOW(), NOW())");

ob_start();
try {
    $_GET['id'] = 'exam-chap-web-01';
    $_GET['chapter_id'] = 'chap-web-01';
    require 'api/exams/get.php';
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
$out = ob_get_clean();
echo substr($out, 0, 1000);
