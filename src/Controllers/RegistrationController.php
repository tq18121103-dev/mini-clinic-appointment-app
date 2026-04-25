<?php namespace App\Controllers; 

use App\Support\Response; 

class RegistrationController
{
    public function store($appointments, $config)
    {
    // 🔥 Content-Type
    if (strpos($_SERVER['CONTENT_TYPE'], 'application/json') === false) {
        Response::json(415, [
            'error' => 'Unsupported Media Type',
            'message' => 'Content-Type must be application/json'
        ]);
        return;
    }

    // 🔥 đọc body
    $input = json_decode(file_get_contents('php://input'), true);

    if (!$input) {
        Response::json(422, [
            'error' => 'Unprocessable Content',
            'message' => 'Invalid JSON body'
        ]);
        return;
    }

    // 🔥 validate required
    if (
        empty($input['appointment_id']) ||
        empty($input['patient_name']) ||
        empty($input['email']) ||
        !isset($input['quantity'])
    ) {
        Response::json(422, [
            'error' => 'Unprocessable Content',
            'message' => 'appointment_id, patient_name, email, quantity are required'
        ]);
        return;
    }

    // 🔥 validate kiểu dữ liệu
    if (!is_int($input['quantity']) || $input['quantity'] <= 0) {
        Response::json(422, [
            'error' => 'Unprocessable Content',
            'message' => 'Quantity must be a positive integer'
        ]);
        return;
    }

    // 🔥 tìm appointment
    $appointment = null;
    foreach ($appointments as $item) {
        if ($item['id'] == $input['appointment_id']) {
            $appointment = $item;
            break;
        }
    }

    if (!$appointment) {
        Response::json(422, [
            'error' => 'Unprocessable Content',
            'message' => 'Appointment not found'
        ]);
        return;
    }

    // 🔥 check slot
    if ($input['quantity'] > $appointment['slots_available']) {
        Response::json(422, [
            'error' => 'Unprocessable Content',
            'message' => 'Not enough slots available'
        ]);
        return;
    }

    // ✅ SUCCESS
    $id = time();
    header("Location: /registrations/$id");

    Response::json(201, [
        'message' => 'Registration created successfully',
        'data' => [
            'registration_id' => $id,
            'patient_name' => $input['patient_name'],
            'email' => $input['email'],
            'appointment_id' => $input['appointment_id'],
            'quantity' => $input['quantity']
        ]
    ]);
    }
    public function options()
    {
    header('Allow: POST, OPTIONS');
    http_response_code(204);
    }
}
