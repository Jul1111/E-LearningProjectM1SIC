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

    public static function getByUserID(int $userId) : ?UserRoles {
        $query = self::fetchOne('SELECT * FROM user_roles WHERE user_id = :user_id', [
            ':user_id' => $userId
        ]);

        if ($query) {
            return new UserRoles($query['user_id'], $query['role_id']);
        }

        return null;
    }

    public static function setUserRole(int $userId, int $roleId = 1)  {
        $query = Database::execute('INSERT INTO user_roles (user_id, role_id) VALUES (:user_id, :role_id)', [
            ':user_id' => $userId,
            ':role_id' => $roleId
        ]);
        return $query;
    }
}