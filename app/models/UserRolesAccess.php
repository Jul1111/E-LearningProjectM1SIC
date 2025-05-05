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

        public static function setUserRole(int $userId, int $roleId) {
        $query = self::execute('UPDATE user_roles SET role_id = :roleId WHERE user_id = :userId', [
            ':roleId' => $roleId,
            ':userId' => $userId
        ]);

        if ($query) {
            return true;
        }

        return false;
    }
}