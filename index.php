<?php

declare(strict_types=1);

// Require
namespace App\controllers;
require_once __DIR__ . '/vendor/autoload.php';

// Show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start sesion if nto
if(!isset($_SESSION)) { session_start(); }

// Remove ext
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = dirname($_SERVER['SCRIPT_NAME']);

// Remove base path
$path = str_replace($scriptName, '', $requestUri);
$path = trim(parse_url($path, PHP_URL_PATH), '/');

$action = $path ?: 'default';
// Match actions
match($action) {
    'dev' => DevEnvController::getInstance()->render(),
    'login' => LoginController::getInstance()->render(),
    'logout' => LogoutController::getInstance()->logout(),
    'signup' => SignUpController::getInstance()->render(),
    'formation' => FormationController::getInstance()->render(),
    'apropos'   => AproposController::getInstance()->render(),
    'tarifs'    => TarifsController::getInstance()->render(),
    'contact'   => ContactController::getInstance()->render(),
    'dashboard' => DashboardController::getInstance()->render(),
    'profil' => ProfilController::getInstance()->render(),
    'courses' => CoursesController::getInstance()->render(),
    'quiz' => QuizzesController::getInstance()->render(),
    'chapters' => ChapterController::getInstance()->render(),
    'payment' => PaymentController::getInstance()->render(),
    default => HomeController::getInstance()->render(),
};

