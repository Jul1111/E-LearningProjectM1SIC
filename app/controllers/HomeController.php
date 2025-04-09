<?php
namespace App\Controllers;

class HomeController {
    # Variable(s)
    private static $_instance = NULL;

    # Method(s)
    private function __construct() {}

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new HomeController();
        }

        return self::$_instance;
    }

    public function render() {
        // Chemin vers la vue
        $viewPath = __DIR__ . '/../views/home/home.php';

        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "Vue introuvable : " . $viewPath;
        }
    }
}
