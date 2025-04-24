<?php
$universityData = [
    [
        'name' => 'Informatik',
        'dekanat' => 'Prof. Dr. Ada Lovelace',
        'studiengaenge' => [
            [
                'name' => 'Angewandte Informatik',
                'typ' => 'Bachelor',
                'module' => [
                    [
                        'id' => 'AI101',
                        'name' => 'Grundlagen der Programmierung',
                        'semester' => 1,
                        'dozent' => 'Dr. Klaus Byte',
                        'studenten' => [
                            ['matrikelnummer' => '123456', 'vorname' => 'Max', 'nachname' => 'Mustermann'],
                            ['matrikelnummer' => '654321', 'vorname' => 'Erika', 'nachname' => 'Musterfrau']
                        ]
                    ],
                    [
                        'id' => 'AI102',
                        'name' => 'Algorithmen und Datenstrukturen',
                        'semester' => 2,
                        'dozent' => 'Prof. Dr. Alan Turing',
                        'studenten' => [
                            ['matrikelnummer' => '123456', 'vorname' => 'Max', 'nachname' => 'Mustermann']
                        ]
                    ]
                ]
            ],
            [
                'name' => 'Data Science',
                'typ' => 'Master',
                'module' => [
                    [
                        'id' => 'DS501',
                        'name' => 'Machine Learning',
                        'semester' => 1,
                        'dozent' => 'Dr. Grace Hopper',
                        'studenten' => [
                            ['matrikelnummer' => '789012', 'vorname' => 'Peter', 'nachname' => 'Schmidt']
                        ]
                    ],
                    [
                        'id' => 'DS502',
                        'name' => 'Big Data Technologien',
                        'semester' => 1,
                        'dozent' => 'Prof. Dr. Charles Babbage',
                        'studenten' => [
                            ['matrikelnummer' => '789012', 'vorname' => 'Peter', 'nachname' => 'Schmidt'],
                            ['matrikelnummer' => '345678', 'vorname' => 'Anna', 'nachname' => 'Müller']
                        ]
                    ]
                ]
            ]
        ]
    ],
    [
        'name' => 'Wirtschaftswissenschaften',
        'dekanat' => 'Prof. Dr. Johanna Ökonom',
        'studiengaenge' => [
            [
                'name' => 'Betriebswirtschaftslehre',
                'typ' => 'Bachelor',
                'module' => [
                    [
                        'id' => 'BWL101',
                        'name' => 'Einführung in die BWL',
                        'semester' => 1,
                        'dozent' => 'Dr. Adam Smith',
                        'studenten' => [
                            ['matrikelnummer' => '112233', 'vorname' => 'Julia', 'nachname' => 'Weber']
                        ]
                    ],
                    [
                        'id' => 'BWL201',
                        'name' => 'Marketing',
                        'semester' => 3,
                        'dozent' => 'Prof. Dr. Eva Marketing',
                        'studenten' => [
                            ['matrikelnummer' => '112233', 'vorname' => 'Julia', 'nachname' => 'Weber'],
                            ['matrikelnummer' => '445566', 'vorname' => 'Markus', 'nachname' => 'Fischer']
                        ]
                    ]
                ]
            ]
        ]
    ]

];

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Universitätsstruktur</title>
    <link href="../styles.css" rel="stylesheet">
</head>
<body>

<main class="university">
    <h1>Universitätsstruktur</h1>

    <?php foreach ($universityData as $faculty): ?>
        <section class="faculty">
            <h2 class="faculty__name">Fakultät: <?= htmlspecialchars($faculty['name']) ?></h2>
            <p class="faculty__dean">Dekanat: <?= htmlspecialchars($faculty['dekanat']) ?></p>

            <?php foreach ($faculty['studiengaenge'] as $course): ?>
                <section class="course">
                    <h3 class="course__title">Studiengang: <?= htmlspecialchars($course['name']) ?> (Typ: <?= htmlspecialchars($course['typ']) ?>)</h3>
                    <ul class="course__module-list">
                        <?php foreach ($course['module'] as $module): ?>
                            <li class="module" data-module-id="<?= htmlspecialchars($module['id']) ?>">
                                <h4 class="module__name">Modul: <?= htmlspecialchars($module['name']) ?></h4>
                                <p class="module__semester">Semester: <?= htmlspecialchars($module['semester']) ?></p>
                                <p class="module__lecturer">Dozent: <?= htmlspecialchars($module['dozent']) ?></p>
                                <h5 class="module__student-heading">Eingeschriebene Studierende:</h5>
                                <ul class="student-list">
                                    <?php foreach ($module['studenten'] as $student): ?>
                                        <li class="student-list__item" data-matrikelnummer="<?= htmlspecialchars($student['matrikelnummer']) ?>">
                                            <span class="student-list__matriculation-number">(<?= htmlspecialchars($student['matrikelnummer']) ?>)</span>
                                            <?= htmlspecialchars($student['nachname']) ?>, <?= htmlspecialchars($student['vorname']) ?>
                                        </li>
                                    <?php endforeach; // student loop ?>
                                </ul>
                            </li>
                        <?php endforeach; // module loop ?>
                    </ul>
                </section>
            <?php endforeach; // course loop ?>
        </section>
    <?php endforeach; // faculty loop ?>

</main>

</body>
</html>