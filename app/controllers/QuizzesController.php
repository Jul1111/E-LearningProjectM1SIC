<?php
namespace App\Controllers;
use App\models\QuizzesAccess;
use App\models\QuestionsAccess;
use App\models\AnswersAccess;
use App\models\UserQuizResultsAccess;

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

    public static function getCourseByChapterId(int $chapterId): array {
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

        $questions = QuestionsAccess::getByQuizId($quizId);
        shuffle($questions);
        
        return $questions;
    }

    public static function getAnswersForQuestion(int $questionId): array {
        // Vérifie que l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
    
        return AnswersAccess::getByQuestionId($questionId);
    }

    public static function saveUserQuizResult(int $quizId, int $score): bool {
        if (!isset($_SESSION['user_id'])) {
            return false;
        }
    
        $userId = $_SESSION['user_id'];
        return UserQuizResultsAccess::insertResult($userId, $quizId, $score);
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_result') {
    session_start(); // Assure que la session est ouverte si appelée via AJAX

    require_once __DIR__ . '/../models/UserQuizResultsAccess.php';

    $quizId = intval($_POST['quiz_id'] ?? 0);
    $score = intval($_POST['score'] ?? 0);

    $success = QuizzesController::saveUserQuizResult($quizId, $score);
    echo json_encode(['success' => $success]);
    exit;
}