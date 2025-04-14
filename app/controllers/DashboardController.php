<?php
namespace App\Controllers;

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

        $pageName = 'dashboard'; // Only var to change

        // Setup views paths

        $headerPath = __DIR__ . '/../views/navbar_dashboard.php'; // Chemin vers l'en-tête
        $mainView = __DIR__ . '/../views/' . $pageName . '/' . $pageName . '.php'; // Chemin vers la vue
        $footerPath = __DIR__ . '/../views/footer.php'; // Chemin vers le pied de page

        // Include views
        require_once $headerPath;
        require_once $mainView;
        require_once $footerPath; 
    }
}
