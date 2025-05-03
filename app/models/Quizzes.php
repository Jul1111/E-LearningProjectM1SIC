<?php

namespace App\models;

class Quizzes {
    # Variables
    private int $id;
    private int $chapter_id;
    private string $title;
    private bool $is_final;

    # Constructor
    public function __construct(int $id, int $chapter_id, string $title, bool $is_final) {
        $this->id = $id;
        $this->chapter_id = $chapter_id;
        $this->title = $title;
        $this->is_final = $is_final;
    }

    # Getters
    public function getId(): int { return $this->id; }
    public function getChapterId(): int { return $this->chapter_id; }
    public function getTitle(): string { return $this->title; }
    public function isFinal(): bool { return $this->is_final; }
}
