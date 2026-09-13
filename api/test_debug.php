<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/response.php';

try {
    $db = get_db_connection();

    $profiles = $db->query("SELECT id, username, full_name, role, class_id FROM profiles")->fetchAll();
    $classes = $db->query("SELECT * FROM classes")->fetchAll();
    $grades = $db->query("SELECT * FROM grades")->fetchAll();
    $groups = $db->query("SELECT * FROM academic_groups")->fetchAll();
    $courses = $db->query("SELECT id, title, slug, is_published, academic_group_id FROM courses")->fetchAll();
    $chapters = $db->query("SELECT id, course_id, title FROM chapters")->fetchAll();
    $lessons = $db->query("SELECT id, chapter_id, title FROM lessons")->fetchAll();
    $enrollments = $db->query("SELECT * FROM course_enrollments")->fetchAll();

    success_response([
        'profiles' => $profiles,
        'classes' => $classes,
        'grades' => $grades,
        'academic_groups' => $groups,
        'courses' => $courses,
        'chapters' => $chapters,
        'lessons' => $lessons,
        'enrollments' => $enrollments
    ]);
} catch (Exception $e) {
    error_response($e->getMessage(), 500);
}
