<?php

namespace App\models;
use PDO;

class UserQuizResultsAccess extends Database {
    # Methods
    public static function getAll() : array {
        $query = self::query('SELECT * FROM user_quiz_results');
        $table = array();

        foreach($query as $rows) {
            $table[$rows['user_id']] = new UserQuizResults($rows['user_id'], $rows['quiz_id'], $rows['score'], $rows['completed_at']);
        }

        return $table;
    }

    public static function insertResult(int $userId, int $quizId, int $score): bool {
        $sql = "INSERT INTO user_quiz_results (user_id, quiz_id, score, completed_at) VALUES (?, ?, ?, NOW())";
        return self::execute($sql, [$userId, $quizId, $score]);
    }
}