<?php
// src/database.php
/**
 *
 * @param array $config ('db_host', 'db_name', 'db_user', 'db_pass', 'charset').
 * @return PDO
 * @throws PDOException
 */
function getDbConnection(array $config): PDO
{
    $dsn = "mysql:host={$config['db_host']};dbname={$config['db_name']};charset={$config['charset']}";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $config['db_user'], $config['db_pass'], $options);
        return $pdo;
    } catch (\PDOException $e) {

        throw new \PDOException("Fail to connect db: " . $e->getMessage(), (int)$e->getCode());
    }
}