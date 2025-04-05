<?php

declare(strict_types=1);

// Require
namespace App\controller;
require_once __DIR__ . '/vendor/autoload.php';

// Show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start sesion if nto
if(!isset($_SESSION)) { session_start(); }

// Variable(s)
$action = $_GET['action'] ?? 'home'; // Get action if valid else default

// Match actions
match($action) {
    default => HomeController::getInstance()->render(),
};

