<?php

namespace App\models;

class Questions {
    # Variables
    private int $id;
    private int $quiz_id;
    private string $content;

    # Constructor
    public function __construct(int $id, int $quiz_id, string $content) {
        $this->id = $id;
        $this->quiz_id = $quiz_id;
        $this->content = $content;
    }

    # Getters
    public function getId(): int { return $this->id; }
    public function getQuizId(): int { return $this->quiz_id; }
    public function getContent(): string { return $this->content; }
}
