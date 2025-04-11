<?php

namespace App\models;

class CoursesAccess extends Database {
    # Récupérer tous les cours
    public static function getAll(): array {
        $query = self::query('SELECT * FROM courses');
        $courses = [];

        foreach ($query as $row) {
            $courses[$row['id']] = new Courses(
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
