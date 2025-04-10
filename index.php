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
    'Login' => LoginController::getInstance()->render(),
    'SignUp' => SignUpController::getInstance()->render(),
    default => HomeController::getInstance()->render(),
};

