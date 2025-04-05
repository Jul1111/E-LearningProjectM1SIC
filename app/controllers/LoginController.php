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
        echo "Bienvenue sur la page de login !";
    }
}
