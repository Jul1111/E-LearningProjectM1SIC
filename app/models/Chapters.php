<?php

namespace App\models;

class Chapters {
    # Variables
    private int $id;
    private string $title;
    private string $content;
    private int $course_id;

    # Constructor
    public function __construct(int $id, string $title, string $content, int $course_id) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->course_id = $course_id;
    }

    # Getters
    public function getId(): int { return $this->id; }
    public function getTitle(): string { return $this->title; }
    public function getDescription(): string { return $this->content; }
    public function getCourseId(): int { return $this->course_id; }
}
