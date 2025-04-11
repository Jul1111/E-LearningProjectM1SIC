<?php
namespace App\controllers;

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

    public function render() {
        {
            // Chemin vers la vue
            $viewPath = __DIR__ . '/../views/profil/profil.php';
   
            if (file_exists($viewPath)) {
                require_once $viewPath;
            } else {
                echo "Vue introuvable : " . $viewPath;
            }
       }
    }
}
 