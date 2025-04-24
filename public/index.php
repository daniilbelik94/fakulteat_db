<?php
// public/index.php

// Включаем автозагрузчик Composer, если используется, или подключаем файлы вручную
// require_once __DIR__ . '/../vendor/autoload.php'; // Пример для Composer

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/database.php';
require_once __DIR__ . '/../src/repository.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$universityViewData = [];

try {

    $config = require __DIR__ . '/../config/config.php';

    $pdo = getDbConnection($config);

    $faculties = getAllFaculties($pdo);

    foreach ($faculties as $faculty) {
        $facultyData = $faculty;
        $facultyData['studiengaenge'] = [];

        $courses = getCoursesByFacultyId($pdo, $faculty['fakultaet_id']);
        foreach ($courses as $course) {
            $courseData = $course;
            $courseData['module'] = [];

            $modules = getModulesByCourseId($pdo, $course['studiengang_id']);
            foreach ($modules as $module) {
                $moduleData = $module;
                $moduleData['studenten'] = getStudentsByModuleId($pdo, $module['modul_id']);
                $courseData['module'][] = $moduleData;
            }
            $facultyData['studiengaenge'][] = $courseData;
        }
        $universityViewData[] = $facultyData;
    }

    require __DIR__ . '/../templates/university_structure.phtml';

} catch (PDOException $e) {


    echo "<h1>Ein Fehler ist aufgetreten</h1>";
    echo "<p>Entschuldigung, die Seite konnte nicht geladen werden. Bitte versuchen Sie es später erneut.</p>";


} catch (\Throwable $th) {

    echo "<h1>Ein unerwarteter Fehler ist aufgetreten</h1>";
    // echo "<pre>" . $th . "</pre>"; // Для отладки
    exit();
}