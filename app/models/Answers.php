<?php

namespace App\models;

class Answers {
    # Variables
    private int $id;
    private int $question_id;
    private string $content;
    private bool $is_correct;

    # Constructor
    public function __construct(int $id, int $question_id, string $content, bool $is_correct) {
        $this->id = $id;
        $this->question_id = $question_id;
        $this->content = $content;
        $this->is_correct = $is_correct;
    }

    # Getters
    public function getId(): int { return $this->id; }
    public function getQuestionId(): int { return $this->question_id; }
    public function getContent(): string { return $this->content; }
    public function isCorrect(): bool { return $this->is_correct; }
}
