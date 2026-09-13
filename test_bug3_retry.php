<?php
$_SERVER['REQUEST_METHOD'] = 'GET';
require 'config/database.php';
$db = get_db_connection();

session_start();
$_SESSION['user_id'] = 'test-student-123';
$_SESSION['role'] = 'student';

// First submit attempt 1 (Pass)
$_POST['exam_id'] = 'exam-chap-1';
$_POST['chapter_id'] = 'chap-1';
$_POST['answers'] = ['1' => 'A'];
// wait, passing is 60%
// let me just insert it manually
$db->exec("INSERT INTO exam_attempts (id, user_id, exam_id, score, passed, started_at, completed_at) VALUES (UUID(), 'test-student-123', 'exam-chap-1', 75, 1, NOW(), NOW())");

ob_start();
try {
    $_GET['id'] = 'exam-chap-1';
    $_GET['chapter_id'] = 'chap-1';
    require 'api/exams/get.php';
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
$out = ob_get_clean();
echo substr($out, 0, 500);
