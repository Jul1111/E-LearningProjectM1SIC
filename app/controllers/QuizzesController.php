<?php
namespace App\Controllers;
use App\models\QuizzesAccess;
use App\models\QuestionsAccess;
use App\models\AnswersAccess;

class QuizzesController {
    private static $_instance = NULL;

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new QuizzesController();
        }
        return self::$_instance;
    }

    public static function getQuizzes() {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) { header("Location: /login"); exit(); }

        // Get quizzes from the database
        $quizzes = QuizzesAccess::getAll();
        if (!$quizzes) {
            // No quizzes found
            return [];
        }

        // Return quizzes
        return $quizzes;
    }

    public static function getCourse(int $chapterId): array {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) { header("Location: /login"); exit(); }

        // Get course title from the database
        $course = QuizzesAccess::getCourseByChapterId($chapterId);
        if (!$course) {
            // No course title found
            return [];
        }

        // Return course title
        return $course;
    }

    public static function getQuizQuestions(int $quizId): array {
        // Vérifie que l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
    
        // Récupère les questions du quiz
        return QuestionsAccess::getByQuizId($quizId);
    }

    public static function getAnswersForQuestion(int $questionId): array {
        // Vérifie que l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
    
        return AnswersAccess::getByQuestionId($questionId);
    }

    public function render() {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) { header("Location: /login"); exit(); }

        $rootFolder = 'dashboard'; // Only var to change
        $pageName = 'quiz'; // Only var to change

        // Setup views paths
        $headerPath = __DIR__ . '/../views/header_dashboard.php'; // Chemin vers l'en-tête
        $mainView = __DIR__ . '/../views/' . $rootFolder . '/' . $pageName . '/' . $pageName . '.php'; // Chemin vers la vue
        $footerPath = __DIR__ . '/../views/footer.php'; // Chemin vers le pied de page

        // Include views
        require_once $headerPath;
        require_once $mainView;
        require_once $footerPath; 
    }
}
