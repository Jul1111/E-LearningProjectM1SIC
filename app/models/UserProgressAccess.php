<?php

namespace App\models;
use PDO;

class UserProgressAccess extends Database {
    # Methods
    public static function getAll() : array {
        $query = self::query('SELECT * FROM user_progress');
        $table = array();

        foreach($query as $rows) {
            $table[$rows['user_id']] = new UserProgress($rows['user_id'], $rows['chapter_id'], $rows['is_completed'], $rows['completed_at']);
        }

        return $table;
    }
}