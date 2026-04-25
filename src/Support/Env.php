<?php

namespace App\Support;

class Env
{
    protected static array $data = [];

    // Load file .env
    public static function load($path): void
    {
        $file = rtrim($path, '/') . '/.env';

        if (!file_exists($file)) {
            return;
        }

        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {

            // bỏ comment
            if (str_starts_with(trim($line), '#')) {
                continue;
            }

            // tách KEY=VALUE
            [$key, $value] = explode('=', $line, 2);

            $key = trim($key);
            $value = trim($value);

            // bỏ dấu "
            $value = trim($value, '"');

            self::$data[$key] = $value;
        }
    }

    // lấy string
    public static function get($key, $default = null)
    {
        return self::$data[$key] ?? $default;
    }

    // lấy boolean
    public static function bool($key, $default = false): bool
    {
        $value = self::get($key);

        if ($value === null) return $default;

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    // lấy int
    public static function int($key, $default = 0): int
    {
        return (int) self::get($key, $default);
    }
}