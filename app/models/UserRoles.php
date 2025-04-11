<?php

namespace App\models;

class UserRoles {
    # Variables
    private int $user_id;
    private int $role_id;

    # Constructor
    public function __construct(int $user_id, int $role_id) {
        $this->user_id = $user_id;
        $this->role_id = $role_id;
    }

    # Methods
    public function getUserID() : int { return $this->user_id; }
    public function getRoleID() : int { return $this->role_id; }
}