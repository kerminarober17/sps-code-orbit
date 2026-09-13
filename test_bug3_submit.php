<?php
$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST['exam_id'] = 'exam-chap-1';
$_POST['chapter_id'] = 'chap-1';
$_POST['answers'] = ['1' => 'A'];

require 'config/database.php';
$db = get_db_connection();
session_start();
$_SESSION['user_id'] = 'test-student-123';
$_SESSION['role'] = 'student';

ob_start();
try {
    require 'api/exams/submit.php';
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
$out = ob_get_clean();
echo substr($out, 0, 500);
