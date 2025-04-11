<?php

    namespace App\models;
    use PDO;
    use App\controllers\LoginController;

    class UserAccess extends Database {
        # Methods
        public static function getAll() : array {
            $query = self::query('SELECT * FROM users');
            $table = array();

            foreach($query as $rows) {
                $table[$rows['id']] = new User($rows['id'], $rows['username'], $rows['email'], $rows['password_hash'], $rows['created_at']);
            }

            return $table;
        }
    }