<?php
namespace App\controllers;
use App\models\UserAccess;
use App\models\User;


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
            $viewPath = __DIR__ . '/../views/auth/signUp.php';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->signUp();
                return;
            }
            if (file_exists($viewPath)) {
                require_once $viewPath;
            } else {
                echo "Vue introuvable : " . $viewPath;
            }
       }
    }

    public function signUp() {
        // Récupérer les données du formulaire
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Vérifier si l'utilisateur existe déjà
        $existingUser = UserAccess::getByEmail($email);
        if ($existingUser) {
            // L'utilisateur existe déjà
            header("Location: /signUp");
            return;
        }

        // Créer un nouvel utilisateur
        UserAccess::setNewUser($username, $email,$password);

        // Rediriger vers la page de connexion ou d'accueil
        header("Location: /login");
    }
}
