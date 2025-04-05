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
        echo "Bienvenue sur la page d'accueil !";
    }
}
