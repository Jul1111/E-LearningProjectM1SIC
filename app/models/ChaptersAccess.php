<?php

namespace App\models;
use PDO;

class ChapterAccess extends Database {
    # Récupérer tous les chapitres
    public static function getAll(): array {
        $query = self::query('SELECT * FROM chapters');
        $chapters = [];

        foreach ($query as $row) {
            $chapters[$row['id']] = new Chapters(
                (int)$row['id'],
                (int)$row['course_id'],
                $row['title'],
                $row['content']
            );
        }

        return $chapters;
    }

    # Récupérer les chapitres par cours
    public static function getByCourseId(int $courseId): array {
        $rows = self::prepare('SELECT * FROM chapters WHERE course_id = ?', [$courseId]);
        $chapters = [];

        foreach ($rows as $row) {
            $chapters[$row['id']] = new Chapters(
                (int)$row['id'],
                (int)$row['course_id'],
                $row['title'],
                $row['content']
            );
        }

        return $chapters;
    }

    # Récupérer un chapitre par ID
    public static function getById(int $id): ?Chapters {
        $row = self::prepareFetch('SELECT * FROM chapters WHERE id = ?', [$id]);

        if ($row) {
            return new Chapters(
                (int)$row['id'],
                (int)$row['course_id'],
                $row['title'],
                $row['content']
            );
        }

        return null;
    }
}
