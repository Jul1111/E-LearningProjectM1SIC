<?php
namespace App\Controllers;

class DashboardController {
    private static $_instance = NULL;

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new DashboardController();
        }
        return self::$_instance;
    }

    public function render() {
        require_once __DIR__ . '/../views/dashboard/dashboard.php';
    }
}
