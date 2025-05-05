<?php
namespace App\Controllers;
use App\models\QuizzesAccess;
use App\models\UserQuizResultsAccess;

class DashboardController {
    private static $_instance = NULL;

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new DashboardController();
        }
        return self::$_instance;
    }

    public function render() {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) { header("Location: /login"); exit(); }
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'Étudiant') { header("Location: /tarifs"); exit(); }

        $userId = $_SESSION['user_id'];

        $allQuizzes = QuizzesAccess::getAll();
        $userResults = UserQuizResultsAccess::getResultsByUser($userId);

        $totalQuizzes = count($allQuizzes);
        $completed = count($userResults);
        $totalPoints = array_sum(array_column($userResults, 'score'));
        $maxPoints = $completed * 30;
        $avgScore20 = $maxPoints > 0 ? round(($totalPoints / $maxPoints) * 20, 2) : 0;

        $progress = $totalQuizzes > 0 ? round(($completed / $totalQuizzes) * 100, 2) : 0;
        

        $rootFolder = 'dashboard'; // Only var to change
        $pageName = 'dashboard'; // Only var to change

        // Setup views paths
        $headerPath = __DIR__ . '/../views/header_dashboard.php'; // Chemin vers l'en-tête
        $mainView = __DIR__ . '/../views/' . $rootFolder . '/' . $pageName . '/' . $pageName . '.php'; // Chemin vers la vue
        $footerPath = __DIR__ . '/../views/footer.php'; // Chemin vers le pied de page

        // Variables accessibles dans la vue
        $stats = [
            'totalQuizzes' => $totalQuizzes,
            'completed' => $completed,
            'avgScore20' => $avgScore20,
            'progress' => $progress
        ];        

        // Include views
        require_once $headerPath;
        require_once $mainView;
        require_once $footerPath; 
    }
}
