<?php

namespace App\Controllers;

use App\Support\Response;

class AppointmentController
{
    public function index(array $appointments)
    {
        Response::json(200, [
            'message' => 'Appointment list',
            'data' => $appointments
        ]);
    }

    public function head()
    {
        http_response_code(200);
        header('Content-Type: application/json');
    }
}