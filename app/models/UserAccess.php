<?php

namespace App\models;
use PDO;
use App\controllers\LoginController;

class UserAccess extends Database {
    # Methods
    public static function getAll() {
        
        $rows = Database::fetchAll("SELECT * FROM users");
        if (empty($rows)) {
            return [];
        }
        $users = [];
        foreach ($rows as $row) {
            $users[] = new User($row['id'], $row['username'], $row['email'], $row['password_hash'], $row['created_at']);
        }
        return $users;
    }
    public static function getById($id) {
        $user = Database::fetchOne("SELECT * FROM users WHERE id = :id", [
            'id' => $id
        ]);
        if ($user) {
            return new User($user['id'], $user['username'], $user['email'], $user['password_hash'], $user['created_at']);
        } else {
            return null;
        }
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

    public static function setNewUser($username, $email, $password) {
        $existingUser = Database::fetchOne("SELECT * FROM users WHERE email = :email", [
            'email' => $email
        ]);
        if ($existingUser) {
            throw new \Exception('Email already exists.');
        }

        if ($existingUser) {
            throw new \Exception('Email already exists.');
        }

        $query = Database::execute("INSERT INTO users (username, email, password_hash, created_at) VALUES (:username, :email, :password_hash, NOW())", [
            'username' => $username,
            'email' => $email,
            'password_hash' => $password
        ]);
        return $query;
    }

}