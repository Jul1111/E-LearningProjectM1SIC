<?php

namespace App\models;
use PDO;

class ChaptersAccess extends Database {
    # Récupérer tous les chapitres
    public static function getAll(): array {
        $query = self::query('SELECT * FROM chapters');
        $chapters = [];

        foreach ($query as $row) {
            $chapters[$row['id']] = new Chapters(
                (int)$row['id'],
                $row['title'],
                $row['content'],
                (int)$row['course_id']
            );
        }

        return $chapters;
    }

    # Récupérer les chapitres par cours
    public static function getByCourseId(int $courseId): array {
        $row = self::fetchOne('SELECT * FROM chapters WHERE course_id = ?', [$courseId]);

        if ($row) {
            return [
                new Chapters(
                    (int)$row['id'],
                    $row['title'],
                    $row['content'],
                    (int)$row['course_id']
                )
            ];
        }

        return [];
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
