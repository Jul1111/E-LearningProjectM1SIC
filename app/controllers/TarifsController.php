<?php
namespace App\Controllers;

class TarifsController {
    private static $_instance = NULL;

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new TarifsController();
        }
        return self::$_instance;
    }

    public function render() {
        $rootFolder = 'main'; // Only var to change
        $pageName = 'tarifs'; // Only var to change

        // Setup views paths
        $headerPath = __DIR__ . '/../views/header.php'; // Chemin vers l'en-tête
        $mainView = __DIR__ . '/../views/' . $rootFolder . '/' . $pageName . '/' . $pageName . '.php'; // Chemin vers la vue
        $faqPath    = __DIR__ . '/../views/faq.php';
        $footerPath = __DIR__ . '/../views/footer.php'; // Chemin vers le pied de page

        // Include views
        require_once $headerPath;
        require_once $mainView;
        require_once $faqPath;
        require_once $footerPath;
    }
}
