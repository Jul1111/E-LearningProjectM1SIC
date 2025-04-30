<?php

namespace App\models;
use PDO;

class CoursesAccess extends Database {
    # Récupérer tous les cours
    public static function getAll() {
        
        $rows = Database::fetchAll("SELECT * FROM courses");
        if (empty($rows)) {
            return [];
        }
        $courses = [];
        foreach ($rows as $row) {
            $courses[] = new Courses(
                (int)$row['id'],
                $row['title'],
                $row['description'],
                $row['created_at']
            );
        }
        return $courses;
    }

    # Récupérer un cours par ID
    public static function getById(int $id): ?Courses {
        $row = self::prepareFetch('SELECT * FROM courses WHERE id = ?', [$id]);

        if ($row) {
            return new Courses(
                (int)$row['id'],
                $row['title'],
                $row['description'],
                $row['created_at']
            );
        }

        return null;
    }
}
