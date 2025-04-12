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
    public static function getById($id)  {
        $query = self::query('SELECT * FROM users WHERE id = :id', [':id' => $id]);
        $rows = $query->fetch(PDO::FETCH_ASSOC);

        return new User($rows['id'], $rows['username'], $rows['email'], $rows['password_hash'], $rows['created_at']);
    }
    public static function getByEmail($email)  {
        
        $user = Database::fetchOne("SELECT * FROM users WHERE email = :email", [
            'email' => $email
        ]);
        if ($user) {
            return new User($user['id'], $user['username'], $user['email'], $user['password_hash'], $user['created_at']);
        } else {
            return null;
        }        
    }
}