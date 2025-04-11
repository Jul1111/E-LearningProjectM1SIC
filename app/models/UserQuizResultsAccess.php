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
    }