<?php
$_SERVER['REQUEST_METHOD'] = 'GET';
require 'config/database.php';
require 'includes/response.php';
$db = get_db_connection();

// Create fake student
$uid = 'test-student-123';
$db->exec("INSERT IGNORE INTO profiles (id, username, password_hash, full_name, email, role) VALUES ('$uid', 'testuser123', 'hash', 'Test User', 'test@example.com', 'student')");

// Fake session
session_start();
$_SESSION['user_id'] = $uid;
$_SESSION['role'] = 'student';

// Call get.php logic
ob_start();
$_GET['id'] = 'exam-chap-1';
$_GET['chapter_id'] = 'chap-1';
try {
    require 'api/exams/get.php';
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
$out = ob_get_clean();
echo substr($out, 0, 500);
