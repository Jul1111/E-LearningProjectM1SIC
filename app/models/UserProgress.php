<?php

    namespace App\models;

    class UserProgress { 
        # Variables
        private int $user_id;
        private int $chapter_id;
        private bool $is_completed;
        private string $completed_at;

        # Constructor
        public function __construct(int $user_id, int $chapter_id, bool $is_completed, string $completed_at) {
            $this->user_id = $user_id;
            $this->chapter_id = $chapter_id;
            $this->is_completed = $is_completed;
            $this->completed_at = $completed_at;
        }

        # Methods
        public function getUserID() : int { return $this->user_id; }
        public function getChapterID() : int { return $this->chapter_id; }
        public function getIsCompleted() : bool { return $this->is_completed; }
        public function getCompletedAt() : string { return $this->completed_at; }
    }