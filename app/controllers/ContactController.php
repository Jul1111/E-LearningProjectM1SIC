<?php
namespace App\Controllers;
use App\models\UserAccess;

class ContactController {
    private static $_instance = NULL;

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new ContactController();
        }
        return self::$_instance;
    }

    public function render() {
        $pageName = 'contact'; // Only var to change

        // Setup views paths
        $headerPath = __DIR__ . '/../views/header.php'; // Chemin vers l'en-tête
        $mainView = __DIR__ . '/../views/' . $pageName . '/' . $pageName . '.php'; // Chemin vers la vue

        $users = UserAccess::getAll(); // Récupération des utilisateurs
        $userCount = count($users); // Nombre d'utilisateurs
        echo $userCount; // Affichage du nombre d'utilisateurs
        

        $footerPath = __DIR__ . '/../views/footer.php'; // Chemin vers le pied de page

        // Include views
        require_once $headerPath;
        require_once $mainView;
        require_once $footerPath;
    }
}
