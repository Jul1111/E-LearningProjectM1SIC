<?php

namespace App\models;

class Courses {
    # Variables
    private int $id;
    private string $title;
    private string $description;
    private string $created_at;

    # Constructor
    public function __construct(int $id, string $title, string $description, string $created_at) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->created_at = $created_at;
    }

    # Getters
    public function getId(): int { return $this->id; }
    public function getTitle(): string { return $this->title; }
    public function getDescription(): string { return $this->description; }
    public function getCreatedAt(): string { return $this->created_at; }
}
