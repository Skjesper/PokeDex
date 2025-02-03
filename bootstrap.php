<?php

require 'vendor/autoload.php';

use App\Database\Connection;
use App\Database\QueryBuilder;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$config = require __DIR__ . '/config.php';

$database = new QueryBuilder(
    Connection::make(
        $config['driver'],
        $config['host'],
        $config['database'],
        $config['username'],
        $config['password']
    )
);