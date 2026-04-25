<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Support\Env;
use App\Support\Response;
use App\Controllers\HomeController;
use App\Controllers\AppointmentController;
use App\Controllers\RegistrationController;

Env::load(__DIR__ . '/../');

$config = require __DIR__ . '/../config/app.php';
$appointments = require __DIR__ . '/../src/Data/appointments.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// HOME
if ($path === '/' && $method === 'GET') {
    $controller = new HomeController();
    $data = $controller->index($config, $appointments);

    extract($data);
    require __DIR__ . '/../views/home.php';
    exit;
}

// APPOINTMENTS
if ($path === '/appointments') {

    $controller = new AppointmentController();

    if ($method === 'GET') {
        $controller->index($appointments);
        exit;
    }

    if ($method === 'HEAD') {
        $controller->head();
        exit;
    }

    http_response_code(405);
    header('Allow: GET, HEAD');
    echo 'Method Not Allowed';
    exit;
}

// REGISTRATION
if ($path === '/registrations') {

    $controller = new RegistrationController();

    if ($method === 'POST') {
        $controller->store($appointments, $config);
        exit;
    }

    if ($method === 'OPTIONS') {
        $controller->options();
        exit;
    }

    http_response_code(405);
    header('Allow: POST, OPTIONS');
    echo 'Method Not Allowed';
    exit;
}

// 404
Response::json(404, [
    'error' => 'Not Found',
    'message' => 'Route not found'
]);