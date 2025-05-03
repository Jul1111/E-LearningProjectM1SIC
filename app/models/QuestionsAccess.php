<?php

namespace App\models;
use PDO;

class QuestionsAccess extends Database {
    # Récupérer toutes les questions
    public static function getAll(): array {
        $query = self::query('SELECT * FROM questions');
        $questions = [];

        foreach ($query as $row) {
            $questions[$row['id']] = new Questions(
                (int)$row['id'],
                (int)$row['quiz_id'],
                $row['content']
            );
        }

        return $questions;
    }

    # Récupérer les questions par ID de quiz
    public static function getByQuizId(int $quizId): array {
        $rows = self::fetchAll("SELECT * FROM questions WHERE quiz_id = ?", [$quizId]);

        if (empty($rows)) {
            return [];
        }

        $questions = [];
        foreach ($rows as $row) {
            $questions[] = new Questions(
                (int)$row['id'],
                (int)$row['quiz_id'],
                $row['content']
            );
        }

        return $questions;
    }

    # Récupérer une seule question par son ID
    public static function getById(int $id): ?Questions {
        $row = self::prepareFetch('SELECT * FROM questions WHERE id = ?', [$id]);

        if ($row) {
            return new Questions(
                (int)$row['id'],
                (int)$row['quiz_id'],
                $row['content']
            );
        }

        return null;
    }
}
