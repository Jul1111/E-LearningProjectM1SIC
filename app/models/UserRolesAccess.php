<?php

    namespace App\models;
    use PDO;

    class UserRolesAccess extends Database {
        # Methods
        public static function getAll() : array {
            $query = self::query('SELECT * FROM user_roles');
            $table = array();

            foreach($query as $rows) {
                $table[$rows['user_id']] = new UserRoles($rows['user_id'], $rows['role_id']);
            }

            return $table;
        }
    }