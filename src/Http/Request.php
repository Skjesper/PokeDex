<?php

declare(strict_types=1);

namespace App\Http;

class Request {

    public static function uri(): string {
        return trim($_SERVER['REQUEST_URI'], '/');
    }
}