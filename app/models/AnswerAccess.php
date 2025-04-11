<?php

namespace App\models;
use PDO;

class AnswerAccess extends Database {
    # Récupérer toutes les réponses
    public static function getAll(): array {
        $query = self::query('SELECT * FROM answers');
        $answers = [];

        foreach ($query as $row) {
            $answers[$row['id']] = new Answer(
                (int)$row['id'],
                (int)$row['question_id'],
                $row['content'],
                (bool)$row['is_correct']
            );
        }

        return $answers;
    }

    # Récupérer les réponses pour une question spécifique
    public static function getByQuestionId(int $questionId): array {
        $rows = self::prepare('SELECT * FROM answers WHERE question_id = ?', [$questionId]);
        $answers = [];

        foreach ($rows as $row) {
            $answers[$row['id']] = new Answer(
                (int)$row['id'],
                (int)$row['question_id'],
                $row['content'],
                (bool)$row['is_correct']
            );
        }

        return $answers;
    }
}
