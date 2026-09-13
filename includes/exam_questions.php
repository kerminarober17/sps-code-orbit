<?php
/**
 * SPS CODE ORBIT — CHAPTER EXAMS DATA REGISTRY (PHP)
 * Provides unique 6-question chapter exams (5 MCQs + 1 Essay) per chapter.
 */

function get_chapter_exam_questions($chapter_id) {
    $chapter_id = trim((string)$chapter_id);

    // ===== Python Level 2 Chapter Exams =====
    if (strpos($chapter_id, 'chap-pyl2-01') !== false) {
        return [
            [
                'id' => 'q-pyl2-1-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is the result of `"Python"[1:4]`?',
                'options' => [
                    ['key' => 'A', 'text' => '`Pyt`'],
                    ['key' => 'B', 'text' => '`yth`'],
                    ['key' => 'C', 'text' => '`ytho`'],
                    ['key' => 'D', 'text' => '`Python`']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-1-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `find()` return when a substring is not found?',
                'options' => [
                    ['key' => 'A', 'text' => '`0`'],
                    ['key' => 'B', 'text' => '`False`'],
                    ['key' => 'C', 'text' => '`-1`'],
                    ['key' => 'D', 'text' => 'An error']
                ],
                'points' => 10,
                'correct_answer' => 'C',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-1-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `"A,B,C".split(",")` return?',
                'options' => [
                    ['key' => 'A', 'text' => '`"A B C"`'],
                    ['key' => 'B', 'text' => '`["A", "B", "C"]`'],
                    ['key' => 'C', 'text' => '`["A,B,C"]`'],
                    ['key' => 'D', 'text' => '`("A", "B", "C")`']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-1-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `strip()` primarily remove?',
                'options' => [
                    ['key' => 'A', 'text' => 'All letters'],
                    ['key' => 'B', 'text' => 'Leading and trailing whitespace by default'],
                    ['key' => 'C', 'text' => 'All punctuation'],
                    ['key' => 'D', 'text' => 'Duplicate words']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-1-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'Ask the user for a sentence and print the number of words in it using `split()` and `len()`.',
                'options' => [
                    ['key' => 'A', 'text' => 'Write the required program'],
                    ['key' => 'B', 'text' => 'Skip'],
                    ['key' => 'C', 'text' => 'N/A'],
                    ['key' => 'D', 'text' => 'N/A']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'Complete the coding task as described.'
            ]
        ];
    }
    if (strpos($chapter_id, 'chap-pyl2-02') !== false) {
        return [
            [
                'id' => 'q-pyl2-2-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which collection is designed to keep unique values?',
                'options' => [
                    ['key' => 'A', 'text' => 'List'],
                    ['key' => 'B', 'text' => 'Tuple'],
                    ['key' => 'C', 'text' => 'Set'],
                    ['key' => 'D', 'text' => 'String']
                ],
                'points' => 10,
                'correct_answer' => 'C',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-2-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which statement about tuples is correct?',
                'options' => [
                    ['key' => 'A', 'text' => 'They cannot be indexed'],
                    ['key' => 'B', 'text' => 'Their items cannot be reassigned after creation'],
                    ['key' => 'C', 'text' => 'They automatically remove duplicates'],
                    ['key' => 'D', 'text' => 'They require string keys']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-2-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `enumerate(items, start=1)` provide?',
                'options' => [
                    ['key' => 'A', 'text' => 'Only values'],
                    ['key' => 'B', 'text' => 'Numbered index-value pairs'],
                    ['key' => 'C', 'text' => 'A set'],
                    ['key' => 'D', 'text' => 'Sorted values']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-2-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `zip()` primarily do?',
                'options' => [
                    ['key' => 'A', 'text' => 'Compress files'],
                    ['key' => 'B', 'text' => 'Pair items from iterables by position'],
                    ['key' => 'C', 'text' => 'Remove duplicates'],
                    ['key' => 'D', 'text' => 'Sort lists']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-2-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'Given two lists of student names and scores, print each student with their score using `zip()`.',
                'options' => [
                    ['key' => 'A', 'text' => 'Write the required program'],
                    ['key' => 'B', 'text' => 'Skip'],
                    ['key' => 'C', 'text' => 'N/A'],
                    ['key' => 'D', 'text' => 'N/A']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'Complete the coding task as described.'
            ]
        ];
    }
    if (strpos($chapter_id, 'chap-pyl2-03') !== false) {
        return [
            [
                'id' => 'q-pyl2-3-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `[x * 2 for x in numbers]` do?',
                'options' => [
                    ['key' => 'A', 'text' => 'Doubles every value into a new list'],
                    ['key' => 'B', 'text' => 'Deletes values'],
                    ['key' => 'C', 'text' => 'Sorts values'],
                    ['key' => 'D', 'text' => 'Creates a tuple']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-3-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does the `if` at the end of a list comprehension do?',
                'options' => [
                    ['key' => 'A', 'text' => 'Filters items'],
                    ['key' => 'B', 'text' => 'Formats output'],
                    ['key' => 'C', 'text' => 'Defines a function'],
                    ['key' => 'D', 'text' => 'Creates a dictionary']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-3-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which is equivalent to `[n for n in numbers if n > 0]`?',
                'options' => [
                    ['key' => 'A', 'text' => 'A loop that appends only positive numbers'],
                    ['key' => 'B', 'text' => 'A loop that removes all numbers'],
                    ['key' => 'C', 'text' => 'A loop that sorts numbers'],
                    ['key' => 'D', 'text' => 'A loop that converts numbers to strings']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-3-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'Why might a normal loop be better than a complex comprehension?',
                'options' => [
                    ['key' => 'A', 'text' => 'Loops are always faster'],
                    ['key' => 'B', 'text' => 'Readability may be better'],
                    ['key' => 'C', 'text' => 'Comprehensions cannot use conditions'],
                    ['key' => 'D', 'text' => 'Lists cannot use loops']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-3-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'Create a list of squares of all even numbers from 1 to 20 using a list comprehension.',
                'options' => [
                    ['key' => 'A', 'text' => 'Write the required program'],
                    ['key' => 'B', 'text' => 'Skip'],
                    ['key' => 'C', 'text' => 'N/A'],
                    ['key' => 'D', 'text' => 'N/A']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'Complete the coding task as described.'
            ]
        ];
    }
    if (strpos($chapter_id, 'chap-pyl2-04') !== false) {
        return [
            [
                'id' => 'q-pyl2-4-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does a dictionary store?',
                'options' => [
                    ['key' => 'A', 'text' => 'Only numbers'],
                    ['key' => 'B', 'text' => 'Key-value pairs'],
                    ['key' => 'C', 'text' => 'Only strings'],
                    ['key' => 'D', 'text' => 'Ordered indexes only']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-4-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `student["name"]` access?',
                'options' => [
                    ['key' => 'A', 'text' => 'The key itself'],
                    ['key' => 'B', 'text' => 'The value associated with `"name"`'],
                    ['key' => 'C', 'text' => 'The dictionary length'],
                    ['key' => 'D', 'text' => 'A list index']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-4-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `.items()` provide?',
                'options' => [
                    ['key' => 'A', 'text' => 'Only keys'],
                    ['key' => 'B', 'text' => 'Only values'],
                    ['key' => 'C', 'text' => 'Key-value pairs'],
                    ['key' => 'D', 'text' => 'Sorted values']
                ],
                'points' => 10,
                'correct_answer' => 'C',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-4-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'What can `get()` do when a key is missing?',
                'options' => [
                    ['key' => 'A', 'text' => 'Automatically create a class'],
                    ['key' => 'B', 'text' => 'Return a fallback value instead of raising `KeyError`'],
                    ['key' => 'C', 'text' => 'Delete the dictionary'],
                    ['key' => 'D', 'text' => 'Sort the dictionary']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-4-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is a nested dictionary?',
                'options' => [
                    ['key' => 'A', 'text' => 'A dictionary containing another dictionary as a value'],
                    ['key' => 'B', 'text' => 'A dictionary with no keys'],
                    ['key' => 'C', 'text' => 'A list with strings'],
                    ['key' => 'D', 'text' => 'A set of dictionaries only']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-4-6',
                'order_index' => 6,
                'question_type' => 'multiple_choice',
                'question_text' => 'Create a dictionary of three students and print the name and score of every student scoring 60 or above.',
                'options' => [
                    ['key' => 'A', 'text' => 'Write the required program'],
                    ['key' => 'B', 'text' => 'Skip'],
                    ['key' => 'C', 'text' => 'N/A'],
                    ['key' => 'D', 'text' => 'N/A']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'Complete the coding task as described.'
            ]
        ];
    }
    if (strpos($chapter_id, 'chap-pyl2-05') !== false) {
        return [
            [
                'id' => 'q-pyl2-5-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is a local variable?',
                'options' => [
                    ['key' => 'A', 'text' => 'A variable accessible everywhere'],
                    ['key' => 'B', 'text' => 'A variable created inside a function and normally accessible there'],
                    ['key' => 'C', 'text' => 'A variable stored in a list'],
                    ['key' => 'D', 'text' => 'A constant']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-5-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'Why are parameters useful?',
                'options' => [
                    ['key' => 'A', 'text' => 'They allow functions to receive data'],
                    ['key' => 'B', 'text' => 'They stop loops'],
                    ['key' => 'C', 'text' => 'They create files'],
                    ['key' => 'D', 'text' => 'They remove scope']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-5-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `return` do?',
                'options' => [
                    ['key' => 'A', 'text' => 'Sends a value back to the caller and exits the function'],
                    ['key' => 'B', 'text' => 'Prints every variable'],
                    ['key' => 'C', 'text' => 'Repeats the function forever'],
                    ['key' => 'D', 'text' => 'Creates a dictionary']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-5-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does a default argument provide?',
                'options' => [
                    ['key' => 'A', 'text' => 'A fallback value when no argument is supplied'],
                    ['key' => 'B', 'text' => 'A required value'],
                    ['key' => 'C', 'text' => 'A global variable'],
                    ['key' => 'D', 'text' => 'A new module']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-5-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'Write `calculate_average(scores)` and `is_passing(average, passing_mark=60)`. Use them together in a small program.',
                'options' => [
                    ['key' => 'A', 'text' => 'Write the required program'],
                    ['key' => 'B', 'text' => 'Skip'],
                    ['key' => 'C', 'text' => 'N/A'],
                    ['key' => 'D', 'text' => 'N/A']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'Complete the coding task as described.'
            ]
        ];
    }
    if (strpos($chapter_id, 'chap-pyl2-06') !== false) {
        return [
            [
                'id' => 'q-pyl2-6-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which mode is used for reading?',
                'options' => [
                    ['key' => 'A', 'text' => '`r`'],
                    ['key' => 'B', 'text' => '`w`'],
                    ['key' => 'C', 'text' => '`a`'],
                    ['key' => 'D', 'text' => '`x`']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-6-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which mode appends to an existing file?',
                'options' => [
                    ['key' => 'A', 'text' => '`r`'],
                    ['key' => 'B', 'text' => '`w`'],
                    ['key' => 'C', 'text' => '`a`'],
                    ['key' => 'D', 'text' => '`p`']
                ],
                'points' => 10,
                'correct_answer' => 'C',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-6-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'Why use `with open(...)`?',
                'options' => [
                    ['key' => 'A', 'text' => 'It automatically closes the file after the block'],
                    ['key' => 'B', 'text' => 'It prevents all errors'],
                    ['key' => 'C', 'text' => 'It converts files to lists'],
                    ['key' => 'D', 'text' => 'It permanently stores variables']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-6-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `read()` generally return?',
                'options' => [
                    ['key' => 'A', 'text' => 'The file contents as a string'],
                    ['key' => 'B', 'text' => 'A dictionary'],
                    ['key' => 'C', 'text' => 'A number'],
                    ['key' => 'D', 'text' => 'A set']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-6-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is `pathlib.Path` useful for?',
                'options' => [
                    ['key' => 'A', 'text' => 'Working with filesystem paths'],
                    ['key' => 'B', 'text' => 'Creating functions'],
                    ['key' => 'C', 'text' => 'Formatting f-strings'],
                    ['key' => 'D', 'text' => 'Handling loops']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-6-6',
                'order_index' => 6,
                'question_type' => 'multiple_choice',
                'question_text' => 'Create a program that saves three tasks to a file, reads them back, and prints them as a numbered list.',
                'options' => [
                    ['key' => 'A', 'text' => 'Write the required program'],
                    ['key' => 'B', 'text' => 'Skip'],
                    ['key' => 'C', 'text' => 'N/A'],
                    ['key' => 'D', 'text' => 'N/A']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'Complete the coding task as described.'
            ]
        ];
    }
    if (strpos($chapter_id, 'chap-pyl2-07') !== false) {
        return [
            [
                'id' => 'q-pyl2-7-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `import random` do?',
                'options' => [
                    ['key' => 'A', 'text' => 'Loads the `random` module so its functionality can be used'],
                    ['key' => 'B', 'text' => 'Creates a random file'],
                    ['key' => 'C', 'text' => 'Deletes variables'],
                    ['key' => 'D', 'text' => 'Starts a loop']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-7-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which function chooses one item from a sequence randomly?',
                'options' => [
                    ['key' => 'A', 'text' => '`random.pick()`'],
                    ['key' => 'B', 'text' => '`random.choice()`'],
                    ['key' => 'C', 'text' => '`random.select()`'],
                    ['key' => 'D', 'text' => '`random.one()`']
                ],
                'points' => 10,
                'correct_answer' => 'B',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-7-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which module provides `math.pi`?',
                'options' => [
                    ['key' => 'A', 'text' => '`random`'],
                    ['key' => 'B', 'text' => '`datetime`'],
                    ['key' => 'C', 'text' => '`math`'],
                    ['key' => 'D', 'text' => '`path`']
                ],
                'points' => 10,
                'correct_answer' => 'C',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-7-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is a custom module?',
                'options' => [
                    ['key' => 'A', 'text' => 'A Python file containing reusable code that another file can import'],
                    ['key' => 'B', 'text' => 'A special list'],
                    ['key' => 'C', 'text' => 'A database'],
                    ['key' => 'D', 'text' => 'A loop']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-7-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'Use `random` to build a program that randomly selects one student from a list and prints a message for them.',
                'options' => [
                    ['key' => 'A', 'text' => 'Write the required program'],
                    ['key' => 'B', 'text' => 'Skip'],
                    ['key' => 'C', 'text' => 'N/A'],
                    ['key' => 'D', 'text' => 'N/A']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'Complete the coding task as described.'
            ]
        ];
    }
    if (strpos($chapter_id, 'chap-pyl2-08') !== false) {
        return [
            [
                'id' => 'q-pyl2-8-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which exception commonly occurs when `int("abc")` is attempted?',
                'options' => [
                    ['key' => 'A', 'text' => 'ValueError'],
                    ['key' => 'B', 'text' => 'IndexError'],
                    ['key' => 'C', 'text' => 'KeyError'],
                    ['key' => 'D', 'text' => 'FileNotFoundError']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-8-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is the purpose of `try/except`?',
                'options' => [
                    ['key' => 'A', 'text' => 'To handle expected exceptions without crashing the normal program flow'],
                    ['key' => 'B', 'text' => 'To make syntax unnecessary'],
                    ['key' => 'C', 'text' => 'To remove all bugs'],
                    ['key' => 'D', 'text' => 'To replace functions']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-8-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'Why should broad `except:` blocks be avoided when possible?',
                'options' => [
                    ['key' => 'A', 'text' => 'They can hide unrelated programming errors'],
                    ['key' => 'B', 'text' => 'They cannot catch errors'],
                    ['key' => 'C', 'text' => 'They are only for files'],
                    ['key' => 'D', 'text' => 'They prevent input']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-8-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'When does `else` run in `try/except/else`?',
                'options' => [
                    ['key' => 'A', 'text' => 'When the `try` block succeeds without the handled exception'],
                    ['key' => 'B', 'text' => 'Whenever an error occurs'],
                    ['key' => 'C', 'text' => 'Before `try`'],
                    ['key' => 'D', 'text' => 'Only after `finally`']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-8-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is `raise` used for?',
                'options' => [
                    ['key' => 'A', 'text' => 'Deliberately signaling an exception condition'],
                    ['key' => 'B', 'text' => 'Increasing a number'],
                    ['key' => 'C', 'text' => 'Importing modules'],
                    ['key' => 'D', 'text' => 'Creating lists']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-8-6',
                'order_index' => 6,
                'question_type' => 'multiple_choice',
                'question_text' => 'Write a function that accepts a score from 0 to 100 and raises `ValueError` for invalid scores. Handle the error with `try/except`.',
                'options' => [
                    ['key' => 'A', 'text' => 'Write the required program'],
                    ['key' => 'B', 'text' => 'Skip'],
                    ['key' => 'C', 'text' => 'N/A'],
                    ['key' => 'D', 'text' => 'N/A']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'Complete the coding task as described.'
            ]
        ];
    }
    if (strpos($chapter_id, 'chap-pyl2-09') !== false) {
        return [
            [
                'id' => 'q-pyl2-9-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is a class?',
                'options' => [
                    ['key' => 'A', 'text' => 'A blueprint for creating objects'],
                    ['key' => 'B', 'text' => 'A loop'],
                    ['key' => 'C', 'text' => 'A file'],
                    ['key' => 'D', 'text' => 'A string method']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-9-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `__init__` commonly do?',
                'options' => [
                    ['key' => 'A', 'text' => 'Initializes a new object\'s attributes'],
                    ['key' => 'B', 'text' => 'Deletes an object'],
                    ['key' => 'C', 'text' => 'Imports a module'],
                    ['key' => 'D', 'text' => 'Starts a loop']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-9-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'What does `self` refer to in a normal instance method?',
                'options' => [
                    ['key' => 'A', 'text' => 'The current object instance'],
                    ['key' => 'B', 'text' => 'The whole Python language'],
                    ['key' => 'C', 'text' => 'The parent file'],
                    ['key' => 'D', 'text' => 'The class name only']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-9-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is a method?',
                'options' => [
                    ['key' => 'A', 'text' => 'A function defined inside a class'],
                    ['key' => 'B', 'text' => 'A list element'],
                    ['key' => 'C', 'text' => 'A file mode'],
                    ['key' => 'D', 'text' => 'A dictionary key']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-9-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'Create a `Student` class with `name` and `score`, plus an `is_passing()` method. Create two students and display their results.',
                'options' => [
                    ['key' => 'A', 'text' => 'Write the required program'],
                    ['key' => 'B', 'text' => 'Skip'],
                    ['key' => 'C', 'text' => 'N/A'],
                    ['key' => 'D', 'text' => 'N/A']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'Complete the coding task as described.'
            ]
        ];
    }
    if (strpos($chapter_id, 'chap-pyl2-10') !== false) {
        return [
            [
                'id' => 'q-pyl2-10-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which structure is most appropriate for many student records where each record has named fields?',
                'options' => [
                    ['key' => 'A', 'text' => 'A list of dictionaries'],
                    ['key' => 'B', 'text' => 'One integer'],
                    ['key' => 'C', 'text' => 'One string only'],
                    ['key' => 'D', 'text' => 'A single boolean']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-10-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'Why should a program separate responsibilities into functions?',
                'options' => [
                    ['key' => 'A', 'text' => 'To make code easier to understand, test, reuse, and maintain'],
                    ['key' => 'B', 'text' => 'To make every program longer'],
                    ['key' => 'C', 'text' => 'To avoid variables'],
                    ['key' => 'D', 'text' => 'To remove the need for testing']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-10-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which mode appends text to a file?',
                'options' => [
                    ['key' => 'A', 'text' => '`r`'],
                    ['key' => 'B', 'text' => '`w`'],
                    ['key' => 'C', 'text' => '`a`'],
                    ['key' => 'D', 'text' => '`x`']
                ],
                'points' => 10,
                'correct_answer' => 'C',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-10-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is the main purpose of `try/except`?',
                'options' => [
                    ['key' => 'A', 'text' => 'Handle expected exceptions and keep the program\'s normal flow under control'],
                    ['key' => 'B', 'text' => 'Hide all bugs'],
                    ['key' => 'C', 'text' => 'Replace functions'],
                    ['key' => 'D', 'text' => 'Create objects']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-10-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is the relationship between a class and an object?',
                'options' => [
                    ['key' => 'A', 'text' => 'A class is a blueprint; an object is an instance created from it'],
                    ['key' => 'B', 'text' => 'They are unrelated'],
                    ['key' => 'C', 'text' => 'An object is always a module'],
                    ['key' => 'D', 'text' => 'A class can only contain numbers']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-10-6',
                'order_index' => 6,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which statement best describes a list comprehension?',
                'options' => [
                    ['key' => 'A', 'text' => 'A compact way to create a list from an iterable, optionally filtering items'],
                    ['key' => 'B', 'text' => 'A special kind of dictionary'],
                    ['key' => 'C', 'text' => 'A file-writing command'],
                    ['key' => 'D', 'text' => 'A replacement for every loop']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'See chapter lessons for the underlying concept.'
            ],
            [
                'id' => 'q-pyl2-10-7',
                'order_index' => 7,
                'question_type' => 'multiple_choice',
                'question_text' => 'Build a small persistent Python application using functions, a suitable data structure, file storage, input validation, and exception handling. The application must load existing data, allow the user to add or view records, show at least one calculated summary, and save the data before exit.',
                'options' => [
                    ['key' => 'A', 'text' => 'Write the required program'],
                    ['key' => 'B', 'text' => 'Skip'],
                    ['key' => 'C', 'text' => 'N/A'],
                    ['key' => 'D', 'text' => 'N/A']
                ],
                'points' => 10,
                'correct_answer' => 'A',
                'explanation' => 'Complete the coding task as described.'
            ]
        ];
    }
    // ===== End Python Level 2 =====

    
    // Foundation Track Chapter Exams
    if (strpos($chapter_id, 'pf-01') !== false || strpos($chapter_id, 'welcome') !== false) {
        return [
            [
                'id' => 'q-pf-1-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is the primary purpose of technology in everyday life?',
                'options' => [
                    ['key' => 'A', 'text' => 'To create smart tools and machines that solve human problems'],
                    ['key' => 'B', 'text' => 'To make laptops heavy and hot'],
                    ['key' => 'C', 'text' => 'To completely eliminate the need for electricity'],
                    ['key' => 'D', 'text' => 'To replace all paper books automatically']
                ],
                'points' => 15,
                'correct_answer' => 'A',
                'explanation' => 'Technology consists of human-designed machines and digital systems that solve problems.'
            ],
            [
                'id' => 'q-pf-1-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which of the following best defines a computer program?',
                'options' => [
                    ['key' => 'A', 'text' => 'A random set of guesses made by a screen'],
                    ['key' => 'B', 'text' => 'An ordered, precise list of instructions telling a computer what to do'],
                    ['key' => 'C', 'text' => 'A physical wire inside the computer case'],
                    ['key' => 'D', 'text' => 'A secret code only robots can speak']
                ],
                'points' => 15,
                'correct_answer' => 'B',
                'explanation' => 'A program is a step-by-step instruction manual written for a computer.'
            ],
            [
                'id' => 'q-pf-1-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'Why must programming instructions be written in exact, step-by-step order (sequence)?',
                'options' => [
                    ['key' => 'A', 'text' => 'Computers execute instructions sequentially from top to bottom and cannot guess missing steps'],
                    ['key' => 'B', 'text' => 'Order only matters when connected to Wi-Fi'],
                    ['key' => 'C', 'text' => 'Computers automatically reorganize instructions if you make a mistake'],
                    ['key' => 'D', 'text' => 'Sequential execution only applies to video games']
                ],
                'points' => 15,
                'correct_answer' => 'A',
                'explanation' => 'Computers follow instructions literally in sequence; out-of-order steps break the program logic.'
            ],
            [
                'id' => 'q-pf-1-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'In Python, what function is used to display text or output on the screen?',
                'options' => [
                    ['key' => 'A', 'text' => 'speak()'],
                    ['key' => 'B', 'text' => 'display.show()'],
                    ['key' => 'C', 'text' => 'print()'],
                    ['key' => 'D', 'text' => 'output.write()']
                ],
                'points' => 15,
                'correct_answer' => 'C',
                'explanation' => 'print() is the fundamental standard built-in function used in Python to send text to the output console.'
            ],
            [
                'id' => 'q-pf-1-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'What happens if you write print("Hello World") without closing the quotation mark or parenthesis?',
                'options' => [
                    ['key' => 'A', 'text' => 'The computer guesses the missing quote and fixes it'],
                    ['key' => 'B', 'text' => 'A SyntaxError occurs because the computer requires exact grammatical rules'],
                    ['key' => 'C', 'text' => 'The message prints in red color automatically'],
                    ['key' => 'D', 'text' => 'The computer shuts down']
                ],
                'points' => 15,
                'correct_answer' => 'B',
                'explanation' => 'Programming languages strictly enforce syntax rules; missing quotes trigger a SyntaxError.'
            ],
            [
                'id' => 'q-pf-1-6',
                'order_index' => 6,
                'question_type' => 'essay',
                'question_text' => 'Logic Task: Explain why a computer requires step-by-step instructions (an algorithm) using an everyday example like brushing your teeth.',
                'points' => 25,
                'auto_grade_keywords' => ['step', 'instruction', 'order', 'computer', 'algorithm', 'sequence'],
                'model_answer' => 'A computer cannot think or make assumptions. Just like a recipe or toothbrushing routine, every step must be specified in order (e.g. pick up brush, apply paste, brush teeth). Skipping a step causes the process to fail.',
                'explanation' => 'Ensure the response explains sequence, precise steps, and lack of computer intuition.'
            ]
        ];
    }
    
    // Python Adventures Chapter 1 Exam (5 Questions)
    if (strpos($chapter_id, 'pyadv-01') !== false || strpos($chapter_id, 'hello-python') !== false) {
        return [
            [
                'id' => 'q-pyadv-1-1',
                'order_index' => 1,
                'question_type' => 'multiple_choice',
                'question_text' => 'What is the standard command in Python used to display text and messages on the screen (Console)?',
                'options' => [
                    ['key' => 'A', 'text' => 'display()'],
                    ['key' => 'B', 'text' => 'print()'],
                    ['key' => 'C', 'text' => 'console.write()'],
                    ['key' => 'D', 'text' => 'showText()']
                ],
                'points' => 20,
                'correct_answer' => 'B',
                'explanation' => 'The print() function is the primary built-in command in Python used to output text and data to the console.'
            ],
            [
                'id' => 'q-pyadv-1-2',
                'order_index' => 2,
                'question_type' => 'multiple_choice',
                'question_text' => 'Which of the following lines represents a properly formatted text String in Python?',
                'options' => [
                    ['key' => 'A', 'text' => '"Python Orbit\''],
                    ['key' => 'B', 'text' => '"Code Master"'],
                    ['key' => 'C', 'text' => '(Hello World)'],
                    ['key' => 'D', 'text' => 'Space Station']
                ],
                'points' => 20,
                'correct_answer' => 'B',
                'explanation' => 'Option B uses matching quotation marks at both the beginning and end of the string.'
            ],
            [
                'id' => 'q-pyadv-1-3',
                'order_index' => 3,
                'question_type' => 'multiple_choice',
                'question_text' => 'What will be the exact output of: print("Star" + "ship")?',
                'options' => [
                    ['key' => 'A', 'text' => 'Star ship (with a space)'],
                    ['key' => 'B', 'text' => 'Starship (joined without a space)'],
                    ['key' => 'C', 'text' => 'SyntaxError'],
                    ['key' => 'D', 'text' => 'Star+ship']
                ],
                'points' => 20,
                'correct_answer' => 'B',
                'explanation' => 'The + operator concatenates strings directly as they are. Since neither string contains a space, they join as \'Starship\'.'
            ],
            [
                'id' => 'q-pyadv-1-4',
                'order_index' => 4,
                'question_type' => 'multiple_choice',
                'question_text' => 'Using f-strings, what is the output of: print(f"Speed: {50 + 50} km/h")?',
                'options' => [
                    ['key' => 'A', 'text' => 'Speed: {50 + 50} km/h'],
                    ['key' => 'B', 'text' => 'Speed: 100 km/h'],
                    ['key' => 'C', 'text' => 'Speed: 5050 km/h'],
                    ['key' => 'D', 'text' => 'Runtime Error']
                ],
                'points' => 20,
                'correct_answer' => 'B',
                'explanation' => 'An f-string evaluates expressions inside curly braces {50 + 50}, replacing it with 100.'
            ],
            [
                'id' => 'q-pyadv-1-5',
                'order_index' => 5,
                'question_type' => 'multiple_choice',
                'question_text' => 'When Python displays \'SyntaxError: unexpected EOF while parsing\', what is the most common cause?',
                'options' => [
                    ['key' => 'A', 'text' => 'Forgetting to close an opening parenthesis ) before the end of the line'],
                    ['key' => 'B', 'text' => 'A power outage'],
                    ['key' => 'C', 'text' => 'Typing a variable name in another language'],
                    ['key' => 'D', 'text' => 'The computer monitor is full']
                ],
                'points' => 20,
                'correct_answer' => 'A',
                'explanation' => 'Unexpected EOF (End of File) while parsing commonly occurs when an opening parenthesis ( was never closed.'
            ]
        ];
    }
    
    // Default fallback mapping if chapter ID is chap-web-01 or html-skeleton
    $web_01 = [
        [
            'id' => 'q-web-1-1',
            'order_index' => 1,
            'question_type' => 'multiple_choice',
            'question_text' => 'Which declaration must be placed at the very top of an HTML5 document before any tags?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => '<html>'],
                ['key' => 'B', 'text' => '<!DOCTYPE html>'],
                ['key' => 'C', 'text' => '<head>'],
                ['key' => 'D', 'text' => '<meta charset="UTF-8">']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => '<!DOCTYPE html> is the mandatory standard declaration that tells the browser to render the document using the HTML5 specification.'
        ],
        [
            'id' => 'q-web-1-2',
            'order_index' => 2,
            'question_type' => 'multiple_choice',
            'question_text' => 'What is the correct structural hierarchy for heading elements in HTML?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => '<h1> is the primary main title down to <h6> as the smallest sub-heading'],
                ['key' => 'B', 'text' => '<h6> is the main title and <h1> is the smallest heading'],
                ['key' => 'C', 'text' => 'Heading tags all render in identical font size'],
                ['key' => 'D', 'text' => 'Headings must always be wrapped inside paragraph <p> tags']
            ],
            'points' => 15,
            'correct_answer' => 'A',
            'explanation' => '<h1> represents the top-level main heading on a page, with <h2> through <h6> providing nested sub-section ranks.'
        ],
        [
            'id' => 'q-web-1-3',
            'order_index' => 3,
            'question_type' => 'multiple_choice',
            'question_text' => 'What is the semantic difference between the <strong> tag and the <b> tag?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => '<b> is for paragraphs and <strong> is for headings'],
                ['key' => 'B', 'text' => '<strong> indicates high structural importance for accessibility, while <b> is purely visual bold text'],
                ['key' => 'C', 'text' => '<strong> changes the text color to red'],
                ['key' => 'D', 'text' => 'There is no difference; <b> is the newer HTML5 replacement']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => '<strong> carries semantic weight for screen readers and search engines, whereas <b> applies bold styling without extra emphasis.'
        ],
        [
            'id' => 'q-web-1-4',
            'order_index' => 4,
            'question_type' => 'multiple_choice',
            'question_text' => 'Why are elements like <br> and <hr> referred to as "void" or self-closing tags?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => 'They delete content from the browser window'],
                ['key' => 'B', 'text' => 'They do not enclose text content and therefore do not require a closing tag'],
                ['key' => 'C', 'text' => 'They are only valid inside the <head> element'],
                ['key' => 'D', 'text' => 'They can only be executed by JavaScript']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => 'Void tags like <br> (line break) and <hr> (horizontal rule) insert standalone structural elements without wrapping around inner text.'
        ],
        [
            'id' => 'q-web-1-5',
            'order_index' => 5,
            'question_type' => 'multiple_choice',
            'question_text' => 'What will the browser display for the following snippet?',
            'code' => "<h1>Orbit Terminal</h1>\n<p>Status: <em>Online & Ready</em></p>",
            'options' => [
                ['key' => 'A', 'text' => 'Raw HTML code printed as text'],
                ['key' => 'B', 'text' => 'A large bold title "Orbit Terminal" followed by a paragraph with italicized "Online & Ready"'],
                ['key' => 'C', 'text' => 'An error message indicating unclosed tags'],
                ['key' => 'D', 'text' => 'Two equal sized headings side by side']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => 'Browsers render <h1> as a prominent title block and <em> as emphasized italic text inside the paragraph.'
        ],
        [
            'id' => 'q-web-1-6',
            'order_index' => 6,
            'question_type' => 'essay',
            'question_text' => 'Short Answer Assessment: In your own words, describe the basic anatomy of an HTML document (doctype, html, head, body) and explain why using semantic tags matters.',
            'code' => null,
            'points' => 25,
            'auto_grade_keywords' => ['doctype', 'html', 'head', 'body', 'heading', 'paragraph', 'semantic', 'structure', 'tag'],
            'model_answer' => 'An HTML document begins with <!DOCTYPE html>, followed by the root <html> container. The <head> holds metadata and page titles, while the <body> contains visible content. Semantic tags like <h1> and <p> describe the meaning and hierarchy of elements, improving accessibility for screen readers and SEO indexing.',
            'explanation' => 'Compare your answer against the Model Answer above. Semantic tags give structure and meaning to web content.'
        ]
    ];

    $web_02 = [
        [
            'id' => 'q-web-2-1',
            'order_index' => 1,
            'question_type' => 'multiple_choice',
            'question_text' => 'Which HTML element is used to create a bulleted (unordered) list?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => '<ol>'],
                ['key' => 'B', 'text' => '<ul>'],
                ['key' => 'C', 'text' => '<list>'],
                ['key' => 'D', 'text' => '<dl>']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => '<ul> creates an Unordered List (rendered with bullets), whereas <ol> creates an Ordered List (rendered with numbers).'
        ],
        [
            'id' => 'q-web-2-2',
            'order_index' => 2,
            'question_type' => 'multiple_choice',
            'question_text' => 'What is the only valid direct child element allowed inside an <ol> or <ul> list container?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => '<p>'],
                ['key' => 'B', 'text' => '<li>'],
                ['key' => 'C', 'text' => '<span>'],
                ['key' => 'D', 'text' => '<div>']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => 'List items must be wrapped directly in <li> tags inside list containers to maintain valid HTML syntax and accessibility.'
        ],
        [
            'id' => 'q-web-2-3',
            'order_index' => 3,
            'question_type' => 'multiple_choice',
            'question_text' => 'Which HTML element should be used to format long multi-line quotations from external sources?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => '<q>'],
                ['key' => 'B', 'text' => '<blockquote>'],
                ['key' => 'C', 'text' => '<cite>'],
                ['key' => 'D', 'text' => '<p style="italic">']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => '<blockquote> is the semantic element for block-level quotes, while <q> is for short inline quotes.'
        ],
        [
            'id' => 'q-web-2-4',
            'order_index' => 4,
            'question_type' => 'multiple_choice',
            'question_text' => 'Which tag is specifically designed to represent computer code snippets in a monospace font?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => '<pre>'],
                ['key' => 'B', 'text' => '<code>'],
                ['key' => 'C', 'text' => '<samp>'],
                ['key' => 'D', 'text' => '<var>']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => 'The <code> tag marks technical code snippets inline, often paired with <pre>.'
        ],
        [
            'id' => 'q-web-2-5',
            'order_index' => 5,
            'question_type' => 'multiple_choice',
            'question_text' => 'What output will the browser render for this list?',
            'code' => "<ol>\n  <li>Pre-flight checklist</li>\n  <li>Engine ignition</li>\n</ol>",
            'options' => [
                ['key' => 'A', 'text' => 'Two bulleted items'],
                ['key' => 'B', 'text' => 'A numbered list: 1. Pre-flight checklist and 2. Engine ignition'],
                ['key' => 'C', 'text' => 'A continuous sentence separated by commas'],
                ['key' => 'D', 'text' => 'Two unformatted bold headings']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => '<ol> automatically numbers sequential list items starting at 1.'
        ],
        [
            'id' => 'q-web-2-6',
            'order_index' => 6,
            'question_type' => 'essay',
            'question_text' => 'Short Answer Assessment: Explain when you should use an ordered list (<ol>) versus an unordered list (<ul>), and describe the purpose of <blockquote> and <code>.',
            'code' => null,
            'points' => 25,
            'auto_grade_keywords' => ['ol', 'ul', 'li', 'ordered', 'unordered', 'list', 'blockquote', 'code', 'quote'],
            'model_answer' => 'Use an ordered list (<ol>) when sequence matters, and an unordered list (<ul>) for items without order. <blockquote> formats block-level external quotes, while <code> renders computer syntax in monospace.',
            'explanation' => 'Review the model answer to verify understanding of lists and rich text formatting tags.'
        ]
    ];

    $web_03 = [
        [
            'id' => 'q-web-3-1',
            'order_index' => 1,
            'question_type' => 'multiple_choice',
            'question_text' => 'Which attribute of the <a> tag specifies the destination URL or target path of a hyperlink?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => 'src'],
                ['key' => 'B', 'text' => 'href'],
                ['key' => 'C', 'text' => 'target'],
                ['key' => 'D', 'text' => 'link']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => 'href (Hypertext Reference) specifies the web address or anchor fragment the link points to.'
        ],
        [
            'id' => 'q-web-3-2',
            'order_index' => 2,
            'question_type' => 'multiple_choice',
            'question_text' => 'When opening links in a new browser tab using target="_blank", which attribute combination should always be added for security?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => 'rel="noopener noreferrer"'],
                ['key' => 'B', 'text' => 'security="high"'],
                ['key' => 'C', 'text' => 'type="external"'],
                ['key' => 'D', 'text' => 'mode="sandbox"']
            ],
            'points' => 15,
            'correct_answer' => 'A',
            'explanation' => 'rel="noopener noreferrer" prevents the newly opened tab from accessing window.opener and stealing session references.'
        ],
        [
            'id' => 'q-web-3-3',
            'order_index' => 3,
            'question_type' => 'multiple_choice',
            'question_text' => 'How do you create an in-page bookmark link that jumps directly to an element with id="mission-specs"?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => '<a href="id:mission-specs">'],
                ['key' => 'B', 'text' => '<a href="#mission-specs">'],
                ['key' => 'C', 'text' => '<a target="mission-specs">'],
                ['key' => 'D', 'text' => '<a src="@mission-specs">']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => 'Using a hashtag prefix (#) in the href targets matching element IDs on the current page.'
        ],
        [
            'id' => 'q-web-3-4',
            'order_index' => 4,
            'question_type' => 'multiple_choice',
            'question_text' => 'What is the key difference between a relative URL ("/docs/manual.html") and an absolute URL ("https://sps.edu/docs/manual.html")?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => 'Relative URLs only work on mobile devices'],
                ['key' => 'B', 'text' => 'Relative URLs link to files on the same domain, while absolute URLs specify the full web protocol and domain name'],
                ['key' => 'C', 'text' => 'Absolute URLs load slower because they are encrypted'],
                ['key' => 'D', 'text' => 'There is no difference']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => 'Relative paths depend on the site structure location, whereas absolute paths contain complete internet addresses.'
        ],
        [
            'id' => 'q-web-3-5',
            'order_index' => 5,
            'question_type' => 'multiple_choice',
            'question_text' => 'What type of link is created by <a href="mailto:support@sps.edu">Send Mail</a>?',
            'code' => null,
            'options' => [
                ['key' => 'A', 'text' => 'A link to an external web page'],
                ['key' => 'B', 'text' => 'A shortcut that opens the user\'s default email client'],
                ['key' => 'C', 'text' => 'An automated file download link'],
                ['key' => 'D', 'text' => 'A link that refreshes the page']
            ],
            'points' => 15,
            'correct_answer' => 'B',
            'explanation' => 'The mailto: scheme instructs the OS to launch the default email client.'
        ],
        [
            'id' => 'q-web-3-6',
            'order_index' => 6,
            'question_type' => 'essay',
            'question_text' => 'Short Answer Assessment: Detail how hyperlinks work in HTML, explaining the difference between relative and absolute URLs and why target="_blank" requires rel="noopener noreferrer".',
            'code' => null,
            'points' => 25,
            'auto_grade_keywords' => ['a', 'href', 'link', 'relative', 'absolute', 'target', 'blank', 'noopener', 'url'],
            'model_answer' => 'Hyperlinks use <a> with href to navigate. Relative URLs point to local site files, while absolute URLs specify complete domain addresses. Adding target="_blank" opens links in new tabs, and rel="noopener noreferrer" prevents security exploits.',
            'explanation' => 'Review the model answer to confirm understanding of hyperlinks and security.'
        ]
    ];

    // Select set based on ID or fallback
    if (strpos($chapter_id, '02') !== false || strpos($chapter_id, 'list') !== false) {
        return $web_02;
    }
    if (strpos($chapter_id, '03') !== false || strpos($chapter_id, 'link') !== false || strpos($chapter_id, 'galaxy') !== false) {
        return $web_03;
    }

    return $web_01;
}
