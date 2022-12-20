<?php
error_reporting(E_ERROR | E_PARSE);

require './vendor/autoload.php';
include_once './utils/TemplateEngine.php';
include_once './utils/DBConfiguration.php';
include_once './models/School.php';
include_once './controllers/StudentController.php';
include_once './controllers/SchoolController.php';
include_once './controllers/RoutingController.php';
include_once './controllers/SignupController.php';
include_once './controllers/LoginController.php';
include_once './controllers/AdminController.php';

// include_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

RoutingController::getRouteHandler();
?>