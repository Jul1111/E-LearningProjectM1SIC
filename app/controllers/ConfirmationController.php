<?php
namespace App\Controllers;

class ConfirmationController {
    private static $_instance = NULL;

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new ConfirmationController();
        }
        return self::$_instance;
    }

    public function render() {
        $pageName = 'confirmation'; // Nom de ta page

        // Setup views paths
        $headerPath = __DIR__ . '/../views/header.php';
        $mainView   = __DIR__ . '/../views/' . $pageName . '/' . $pageName . '.php';
        $footerPath = __DIR__ . '/../views/footer.php';

        // Include views
        require_once $headerPath;
        require_once $mainView;
        require_once $footerPath;
    }
}
