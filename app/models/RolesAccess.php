<?php

    namespace App\models;
    use PDO;

    class RolesAccess extends Database {
        # Methods
        public static function getAll() : array {
            $query = self::query('SELECT * FROM roles');
            $table = array();

            foreach($query as $rows) {
                $table[$rows['id']] = new Roles($rows['id'], $rows['name']);
            }

            return $table;
        }
    }