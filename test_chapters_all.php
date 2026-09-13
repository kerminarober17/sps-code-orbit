<?php
require 'config/database.php';
$db = get_db_connection();
$ch = $db->query("SELECT id, course_id FROM chapters")->fetchAll(PDO::FETCH_ASSOC);
print_r($ch);
