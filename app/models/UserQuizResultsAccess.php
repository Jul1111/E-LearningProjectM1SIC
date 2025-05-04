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
        // chekc if the user already has a result for this quiz
        $existingResult = self::fetchOne(
            "SELECT * FROM user_quiz_results WHERE user_id = ? AND quiz_id = ?",
            [$userId, $quizId]
        );

        if ($existingResult) {
            // Update the existing result
            $sql = "UPDATE user_quiz_results SET score = ?, completed_at = NOW() WHERE user_id = ? AND quiz_id = ?";
            return self::execute($sql, [$score, $userId, $quizId]);
        } else {
            $sql = "INSERT INTO user_quiz_results (user_id, quiz_id, score, completed_at) VALUES (?, ?, ?, NOW())";
            return self::execute($sql, [$userId, $quizId, $score]);
        }

        return false;
    }

    public static function deleteResultsByUser(int $userId): bool {
        $sql = "DELETE FROM user_quiz_results WHERE user_id = ?";
        return self::execute($sql, [$userId]);
    }
    

    public static function getResultsByUser(int $userId): array {
        return self::fetchAll(
            "SELECT * FROM user_quiz_results WHERE user_id = ?",
            [$userId]
        );
    }

    public static function getAverageScore(int $userId): float {
        $row = self::fetchOne(
            "SELECT AVG(score) as avg_score FROM user_quiz_results WHERE user_id = ?",
            [$userId]
        );
        return $row && $row['avg_score'] !== null ? round((float)$row['avg_score'], 2) : 0.0;
    }
}