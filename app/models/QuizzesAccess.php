<?php

namespace App\models;
use PDO;

class QuizzesAccess extends Database {
    # Récupérer tous les quiz
    public static function getAll() {
        
        $rows = Database::fetchAll("SELECT * FROM quizzes");
        if (empty($rows)) {
            return [];
        }
        $quizzes = [];
        foreach ($rows as $row) {
            $quizzes[] = new Quizzes(
                (int)$row['id'],
                (int)$row['chapter_id'],
                $row['title'],
                (bool)$row['is_final']
            );
        }
        return $quizzes;
    }

    # Get courses title by using chapter ID
    public static function getCoursesTitleByChapterId(int $chapterId): string {
        $row = self::fetchOne('SELECT courses.title FROM courses JOIN chapters ON courses.id = chapters.course_id WHERE chapters.id = ?', [$chapterId]);

        if ($row) {
            return $row['title'];
        }

        return '';
    }

    # Get course by using chapter ID
    public static function getCourseByChapterId(int $chapterId): array {
        $row = self::fetchOne(
            'SELECT courses.id AS course_id, courses.title AS course_title, courses.description, courses.created_at
             FROM courses
             JOIN chapters ON courses.id = chapters.course_id
             WHERE chapters.id = ?',
            [$chapterId]
        );
        

        if ($row) {
            return [
                new Courses(
                    (int)$row['course_id'],
                    $row['course_title'],
                    $row['description'],
                    $row['created_at']
                )
            ];
        }

        return [];
    }

    # Récupérer les quiz d’un chapitre
    public static function getByChapterId(int $chapterId): array {
        $rows = self::prepare('SELECT * FROM quizzes WHERE chapter_id = ?', [$chapterId]);
        $quizzes = [];

        foreach ($rows as $row) {
            $quizzes[$row['id']] = new Quiz(
                (int)$row['id'],
                (int)$row['chapter_id'],
                $row['title'],
                (bool)$row['is_final']
            );
        }

        return $quizzes;
    }

    # Récupérer un quiz par ID
    public static function getById(int $id): ?Quiz {
        $row = self::prepareFetch('SELECT * FROM quizzes WHERE id = ?', [$id]);

        if ($row) {
            return new Quiz(
                (int)$row['id'],
                (int)$row['chapter_id'],
                $row['title'],
                (bool)$row['is_final']
            );
        }

        return null;
    }
}
