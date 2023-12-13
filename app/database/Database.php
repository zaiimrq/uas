<?php

namespace Tugas\database;

use PDO;

class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo == null) {
            $config = require_once __DIR__ . '/../../config/database.php';
            self::$pdo = new PDO(
                $config["dsn"],
                $config["dbuser"],
                $config["dbpass"]
            );
        }

        return self::$pdo;
    }

    public static function beginTransaction()
    {
        self::$pdo->beginTransaction();
    }

    public static function endTransaction()
    {
        self::$pdo->commit();
    }

    public static function rollbackTransaction()
    {
        self::$pdo->rollBack();
    }
}
