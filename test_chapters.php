<?php
require 'config/database.php';
$db = get_db_connection();
$ch = $db->query("SELECT id, slug, course_id FROM chapters LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
print_r($ch);
