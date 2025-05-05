<?php
namespace App\Controllers;

use App\models\RolesAccess;
use App\models\UserRolesAccess;

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
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $pageName = 'confirmation'; // Nom de ta page
        $user_id = (int)$_SESSION['user_id']; // ID de l'utilisateur connecté
        UserRolesAccess::setUserRole($user_id, 3); // Set role to 2 (Admin)
        $role_id = UserRolesAccess::getByUserID($user_id)->getRoleID();
        $role_str = RolesAccess::getRoleByID($role_id)->getName();

        // Set new role
        $_SESSION['role'] = $role_str;

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
