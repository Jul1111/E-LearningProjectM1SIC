<?php
namespace App\Controllers;
use App\models\ChaptersAccess;

class ChapterController {
    private static $_instance = NULL;

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new ChapterController();
        }
        return self::$_instance;
    }

    public static function getByCourseID(int $courseId): array {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) { header("Location: /login"); exit(); }

        // Get chapters from the database
        $chapters = ChaptersAccess::getByCourseID($courseId);
        if (!$chapters) {
            // No chapters found
            return [];
        }

        // Return chapters
        return $chapters;
    }

    public function render() {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) { header("Location: /login"); exit(); }

        $rootFolder = 'dashboard'; // Only var to change
        $pageName = 'chapter'; // Only var to change

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
