<?php
namespace App\controllers;
use App\models\UserAccess;
use App\models\User;
use App\models\RolesAccess;

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
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->login();
                return;
            }
         if (file_exists($viewPath)) {
             require_once $viewPath;
         } else {
             echo "Vue introuvable : " . $viewPath;
         }
    }
    public function login() {
        // Récupérer les données du formulaire
        $email = $_POST['email'];
        $password = $_POST['password'];
        // Vérifier si l'utilisateur existe
        $user = UserAccess::getByEmail($email);
        
        if (!$user) {
            // L'utilisateur n'existe pas
            header("Location: /login");
            return;
        }
        // Vérifier le mot de passe
        if ($password !== $user->getPasswordHash()) {
            // Mot de passe incorrect
            header("Location: /login");
            return;
        }

        // Remove session if exists
        if (session_status() === PHP_SESSION_ACTIVE) { session_destroy(); }

        // Authentifier l'utilisateur
        session_start();
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['role'] = RolesAccess::getRoleByID($user->getRole()->getRoleId())->getName(); // À opti pcq c'est nul
        $_SESSION['created_at'] = $user->getCreatedAt();
        $_SESSION['is_logged_in'] = true;
        // Rediriger vers la page d'accueil ou tableau de bord
        
        // Check role if "Etudiant" 
        if ($_SESSION['role'] === 'Étudiant') {
            header("Location: /");
            exit();
        } else {
            header("Location: /dashboard");
            exit();
        }

        echo "Connexion réussie !";
    }
}
