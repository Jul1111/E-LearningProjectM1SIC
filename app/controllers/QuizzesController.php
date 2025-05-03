<?php
namespace App\Controllers;
use App\models\QuizzesAccess;

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

    public static function getCourseTitle(int $chapterId): string {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) { header("Location: /login"); exit(); }

        // Get course title from the database
        $courseTitle = QuizzesAccess::getCoursesTitleByChapterId($chapterId);
        if (!$courseTitle) {
            // No course title found
            return '';
        }

        // Return course title
        return $courseTitle;
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
