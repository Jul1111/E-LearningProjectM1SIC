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

    public static function getRoleByID(int $roleId) : ?Roles {
        $query = self::fetchOne('SELECT * FROM roles WHERE id = :id', [
            ':id' => $roleId
        ]);

        if ($query) {
            return new Roles($query['id'], $query['name']);
        }

        return null;
    }
}