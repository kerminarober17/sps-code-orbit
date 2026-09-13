<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/helpers.php';

try {
    $db = get_db_connection();
    echo "Seeding exam data...\n";

    // 1. Find Chapter 2
    $stmt = $db->prepare("SELECT id FROM chapters WHERE id = 'intro-prog-ch2' OR slug = 'variables-and-data' LIMIT 1");
    $stmt->execute();
    $chapter = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$chapter) {
        throw new Exception("Chapter intro-prog-ch2 not found");
    }
    $chapter_id = $chapter['id'];

    // 2. Insert or update Exam
    $exam_id = 'exam-ch2';
    $db->prepare("
        INSERT INTO exams (id, chapter_id, title, description, passing_score_percent)
        VALUES (?, ?, 'Chapter 2 Exam: Variables & Logic', 'Cumulative examination covering Variables, Data Types, and Logic. Answer all questions carefully.', 70)
        ON DUPLICATE KEY UPDATE 
            title = VALUES(title),
            description = VALUES(description),
            passing_score_percent = VALUES(passing_score_percent)
    ")->execute([$exam_id, $chapter_id]);

    // Clear existing questions for this exam to re-seed cleanly
    $stmt = $db->prepare("SELECT question_id FROM exam_questions WHERE exam_id = ?");
    $stmt->execute([$exam_id]);
    $existing_q_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
    if (!empty($existing_q_ids)) {
        $db->prepare("DELETE FROM exam_questions WHERE exam_id = ?")->execute([$exam_id]);
        foreach ($existing_q_ids as $qid) {
            $db->prepare("DELETE FROM question_answer_keys WHERE question_id = ?")->execute([$qid]);
            $db->prepare("DELETE FROM questions WHERE id = ?")->execute([$qid]);
        }
    }

    $exam_data = [
        [
            'id' => 'q-ch2-1',
            'prompt' => 'What will be the output of the following Python program after execution?',
            'code' => "score = 10\nscore = score + 25\nscore = score - 5\nprint(score)",
            'options' => ['10', '25', '30', '35'],
            'correct_index' => 2,
            'explanation' => 'Variables update sequentially: 10 + 25 = 35, then 35 - 5 = 30.',
            'points' => 10
        ],
        [
            'id' => 'q-ch2-2',
            'prompt' => "Which of the following creates a string variable named 'role' with the value 'Coder'?",
            'code' => "A) role == \"Coder\"\nB) role = \"Coder\"\nC) \"Coder\" = role\nD) var role := Coder",
            'options' => ['role == "Coder"', 'role = "Coder"', '"Coder" = role', 'var role := Coder'],
            'correct_index' => 1,
            'explanation' => 'Single "=" is the assignment operator in Python used to bind a variable name to a value.',
            'points' => 10
        ],
        [
            'id' => 'q-ch2-3',
            'prompt' => 'What happens when a new value is assigned to an existing variable in Python?',
            'code' => "x = 5\nx = 10",
            'options' => [
                'An error is thrown because variables cannot change',
                'The variable stores both 5 and 10 simultaneously',
                'The old value (5) is replaced by the new value (10)',
                'A new variable named x_2 is created automatically'
            ],
            'correct_index' => 2,
            'explanation' => 'Variables hold one current value at a time; reassigning overwrites the previous value.',
            'points' => 10
        ],
        [
            'id' => 'q-ch2-4',
            'prompt' => 'What is the expected result of this algorithm?',
            'code' => "width = 4\nheight = 5\narea = width * height\nprint(area)",
            'options' => ['9', '20', '45', 'Error: cannot multiply variables'],
            'correct_index' => 1,
            'explanation' => 'The product of 4 and 5 is 20.',
            'points' => 10
        ],
        [
            'id' => 'q-ch2-5',
            'prompt' => 'Which variable name follows standard Python snake_case conventions?',
            'code' => "1) student_score\n2) StudentScore\n3) studentScore\n4) student-score",
            'options' => ['student_score', 'StudentScore', 'studentScore', 'student-score'],
            'correct_index' => 0,
            'explanation' => 'Python style guide (PEP 8) prescribes snake_case (all lowercase words separated by underscores) for variables.',
            'points' => 10
        ]
    ];

    $ins_q = $db->prepare("
        INSERT INTO questions (id, question_text, question_type, options_json, points)
        VALUES (?, ?, 'multiple_choice', ?, ?)
    ");
    $ins_k = $db->prepare("
        INSERT INTO question_answer_keys (id, question_id, correct_answer, explanation)
        VALUES (?, ?, ?, ?)
    ");
    $ins_eq = $db->prepare("
        INSERT INTO exam_questions (id, exam_id, question_id, order_index)
        VALUES (?, ?, ?, ?)
    ");

    foreach ($exam_data as $idx => $q) {
        $options_payload = json_encode([
            'options' => $q['options'],
            'code' => $q['code']
        ]);
        $ins_q->execute([$q['id'], $q['prompt'], $options_payload, $q['points']]);

        // Correct answer stored as JSON containing the integer index and value
        $answer_payload = json_encode([
            'correct_index' => $q['correct_index'],
            'correct_value' => $q['options'][$q['correct_index']]
        ]);
        $ins_k->execute([generate_uuid_v4(), $q['id'], $answer_payload, $q['explanation']]);

        $ins_eq->execute([generate_uuid_v4(), $exam_id, $q['id'], $idx + 1]);
    }

    echo "Exam {$exam_id} and 5 questions successfully seeded!\n";

} catch (Exception $e) {
    echo "Exam seed error: " . $e->getMessage() . "\n";
}
