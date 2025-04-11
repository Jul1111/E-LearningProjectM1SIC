<?php

namespace App\models;

class Roles {
    # Variables
    private int $id;
    private string $name;
    
    # Constructor
    public function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }   

    # Methods
    public function getID() : int { return $this->id; }
    public function getName() : string { return $this->name; }
}