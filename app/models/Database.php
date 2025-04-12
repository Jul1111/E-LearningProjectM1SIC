<?php

namespace App\models;

use PDO;
use PDOException;

class Database {
    private static ?PDO $pdo = null;

    private const DB_HOST = '127.0.0.1';
    private const DB_NAME = 'L2M';
    private const DB_USER = 'data';
    private const DB_PASS = 'admin2025@';
    private const DB_CHARSET = 'utf8mb4';

    /**
     * Connexion PDO unique
     */
    private static function connect(): PDO {
        if (is_null(self::$pdo)) {
            try {
                $dsn = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=' . self::DB_CHARSET;
                self::$pdo = new PDO($dsn, self::DB_USER, self::DB_PASS, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (PDOException $e) {
                // En prod : journaliser plutôt qu'afficher
                die('Erreur de connexion à la base de données.');
            }
        }
        return self::$pdo;
    }

    /**
     * Exécute une requête (INSERT, UPDATE, DELETE)
     */
    public static function execute(string $sql, array $params = []): bool {
        $stmt = self::connect()->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Retourne un seul résultat (SELECT ... LIMIT 1)
     */
    public static function fetchOne(string $sql, array $params = []): mixed {
        $stmt = self::connect()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    /**
     * Retourne plusieurs résultats (SELECT ...)
     */
    public static function fetchAll(string $sql, array $params = []): array {
        $stmt = self::connect()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Requête sans paramètre (à éviter sauf pour SELECT simples)
     */
    public static function rawQuery(string $sql): false|\PDOStatement {
        return self::connect()->query($sql);
    }
}
