<?php
// index.php

// Afficher les erreurs 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclusion du contrôleur principal
require_once 'controllers/Controller.php';

// Instanciation du contrôleur
$controller = new Controller();

// Logique de routage
if (empty($_SERVER['QUERY_STRING'])) {
  // Aucune variable dans l'URL, on affiche la page d'accueil
  $controller->homeController();
} elseif (isset($_GET['login'])) {
  // Si le paramètre "login" est présent, on affiche la page de login
  $controller->loginController();
} else {
  // Sinon, on affiche une page d'erreur (ou une autre logique par défaut)
  $controller->errorController();
}