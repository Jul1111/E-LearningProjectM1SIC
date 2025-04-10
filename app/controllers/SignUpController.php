<?php
namespace App\controllers;

class SignUpController {
    # Variable(s)
    private static $_instance = NULL;

    # Method(s)
    private function __construct() {}

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new SignUpController();
        }

        return self::$_instance;
    }

    public function render() {
        {
            // Chemin vers la vue
            $viewPath = __DIR__ . '/../views/auth/SignUp.php';
   
            if (file_exists($viewPath)) {
                require_once $viewPath;
            } else {
                echo "Vue introuvable : " . $viewPath;
            }
       }
    }
}
