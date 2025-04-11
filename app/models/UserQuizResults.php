<?php

    namespace App\models;

    class UserQuizResults {
        # Variables
        private int $user_id;
        private int $quiz_id;
        private int $score;
        private string $completed_at;

        # Constructor
        public function __construct(int $user_id, int $quiz_id, int $score, string $completed_at) {
            $this->user_id = $user_id;
            $this->quiz_id = $quiz_id;
            $this->score = $score;
            $this->completed_at = $completed_at;
        }

        # Methods
        public function getUserID() : int { return $this->user_id; }
        public function getQuizID() : int { return $this->quiz_id; }
        public function getScore() : int { return $this->score; }
        public function getCompletedAt() : string { return $this->completed_at; }
    }