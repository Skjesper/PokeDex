<?php

declare(strict_types=1);

function view(string $name) {
    return __DIR__ . '../views/{$name}.php';
}