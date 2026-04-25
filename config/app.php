<?php

use App\Support\Env;

return [
    'app' => [
        'name' => Env::get('APP_NAME', 'Clinic App'),
        'env' => Env::get('APP_ENV', 'dev'),
        'debug' => Env::bool('APP_DEBUG', true),
        'clinic_name' => Env::get('CLINIC_NAME', 'JUHOON Clinic'),
        'max_bookings_per_request' => Env::int('MAX_BOOKINGS_PER_REQUEST', 1),
    ]
];