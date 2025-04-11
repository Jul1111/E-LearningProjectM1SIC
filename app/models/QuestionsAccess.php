<?php

namespace App\models;
use PDO;

class QuestionAccess extends Database {
    # Récupérer toutes les questions
    public static function getAll(): array {
        $query = self::query('SELECT * FROM questions');
        $questions = [];

        foreach ($query as $row) {
            $questions[$row['id']] = new Question(
                (int)$row['id'],
                (int)$row['quiz_id'],
                $row['content']
            );
        }

        return $questions;
    }

    # Récupérer les questions par ID de quiz
    public static function getByQuizId(int $quizId): array {
        $rows = self::prepare('SELECT * FROM questions WHERE quiz_id = ?', [$quizId]);
        $questions = [];

        foreach ($rows as $row) {
            $questions[$row['id']] = new Question(
                (int)$row['id'],
                (int)$row['quiz_id'],
                $row['content']
            );
        }

        return $questions;
    }

    # Récupérer une seule question par son ID
    public static function getById(int $id): ?Question {
        $row = self::prepareFetch('SELECT * FROM questions WHERE id = ?', [$id]);

        if ($row) {
            return new Question(
                (int)$row['id'],
                (int)$row['quiz_id'],
                $row['content']
            );
        }

        return null;
    }
}
