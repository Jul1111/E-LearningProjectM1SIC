<?php

namespace App\models;
use PDO;

class QuizAccess extends Database {
    # Récupérer tous les quiz
    public static function getAll(): array {
        $query = self::query('SELECT * FROM quizzes');
        $quizzes = [];

        foreach ($query as $row) {
            $quizzes[$row['id']] = new Quiz(
                (int)$row['id'],
                (int)$row['chapter_id'],
                $row['title'],
                (bool)$row['is_final']
            );
        }

        return $quizzes;
    }

    # Récupérer les quiz d’un chapitre
    public static function getByChapterId(int $chapterId): array {
        $rows = self::prepare('SELECT * FROM quizzes WHERE chapter_id = ?', [$chapterId]);
        $quizzes = [];

        foreach ($rows as $row) {
            $quizzes[$row['id']] = new Quiz(
                (int)$row['id'],
                (int)$row['chapter_id'],
                $row['title'],
                (bool)$row['is_final']
            );
        }

        return $quizzes;
    }

    # Récupérer un quiz par ID
    public static function getById(int $id): ?Quiz {
        $row = self::prepareFetch('SELECT * FROM quizzes WHERE id = ?', [$id]);

        if ($row) {
            return new Quiz(
                (int)$row['id'],
                (int)$row['chapter_id'],
                $row['title'],
                (bool)$row['is_final']
            );
        }

        return null;
    }
}
