<?php
namespace App\controllers;

class LoginController {
    # Variable(s)
    private static $_instance = NULL;

    # Method(s)
    private function __construct() {}

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new LoginController();
        }

        return self::$_instance;
    }

    public function render() {
         // Chemin vers la vue
         $viewPath = __DIR__ . '/../views/auth/login.php';

         if (file_exists($viewPath)) {
             require_once $viewPath;
         } else {
             echo "Vue introuvable : " . $viewPath;
         }
    }
}
