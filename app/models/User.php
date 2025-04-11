<?php

    namespace App\models;

    class User {
        # Variables
        private string $id;
        private string $username;
        private string $email;
        private string $password_hash;
        private string $created_at;

        # Constructor
        public function __constructor(string $id, string $username, string $email, string $password_hash, string $created_at) {
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->password_hash = $password_hash;
            $this->created_at = $created_at;
        }

        # Functions
        public function getID() : string { return $this->id; }
        public function getUsername() : string { return $this->username; }
        public function getEmail() : string { return $this->email; }
        public function getPasswordHash() : string { return $this->password_hash; }
        public function getCreatedAt() : string { return $this->created_at; }
    }