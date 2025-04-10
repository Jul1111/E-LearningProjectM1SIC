<?php
namespace App\Controllers;

class AproposController {
    private static $_instance = NULL;

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new AproposController();
        }
        return self::$_instance;
    }

    public function render() {
        require_once __DIR__ . '/../views/apropos/apropos.php';
    }
}
