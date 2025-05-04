<?php
namespace App\controllers;

use App\models\UserQuizResultsAccess;

class ProfilController {
    # Variable(s)
    private static $_instance = NULL;

    # Method(s)
    private function __construct() {}

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new ProfilController();
        }

        return self::$_instance;
    }

    public function reset() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
    
        $userId = $_SESSION['user_id'];
    
        UserQuizResultsAccess::deleteResultsByUser($userId);
    
        // Optionnel : message flash ou redirection
        header("Location: /profil?reset=success");
        exit();
    }    

    public function render() {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) { header("Location: /login"); exit(); }

        $resetSuccess = isset($_GET['reset']) && $_GET['reset'] === 'success';

        $rootFolder = 'dashboard'; // Only var to change
        $pageName = 'profil'; // Only var to change

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