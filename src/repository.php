<?php
// src/repository.php


function getAllFaculties(PDO $pdo): array
{
    $stmt = $pdo->query("SELECT fakultaet_id, name, dekanat FROM Fakultaeten ORDER BY name");
    return $stmt->fetchAll();
}


function getCoursesByFacultyId(PDO $pdo, int $facultyId): array
{
    $stmt = $pdo->prepare("SELECT studiengang_id, name, typ FROM Studiengaenge WHERE fakultaet_id = ? ORDER BY name");
    $stmt->execute([$facultyId]);
    return $stmt->fetchAll();
}


function getModulesByCourseId(PDO $pdo, int $courseId): array
{
    $stmt = $pdo->prepare("
        SELECT m.modul_id, m.modul_code, m.name, m.semester, d.name as dozent_name
        FROM Module m
        LEFT JOIN Dozenten d ON m.dozent_id = d.dozent_id
        WHERE m.studiengang_id = ?
        ORDER BY m.semester, m.name
    ");
    $stmt->execute([$courseId]);
    return $stmt->fetchAll();
}

/**
 * Получает студентов для указанного модуля.
 * @param PDO $pdo Объект PDO.
 * @param int $moduleId ID модуля.
 * @return array Массив студентов.
 */
function getStudentsByModuleId(PDO $pdo, int $moduleId): array
{
    $stmt = $pdo->prepare("
        SELECT s.student_id, s.matrikelnummer, s.vorname, s.nachname
        FROM Studenten s
        JOIN Modul_Studenten ms ON s.student_id = ms.student_id
        WHERE ms.modul_id = ?
        ORDER BY s.nachname, s.vorname
    ");
    $stmt->execute([$moduleId]);
    return $stmt->fetchAll();
}