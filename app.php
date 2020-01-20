<?php

require 'vendor/autoload.php';

use App\NamesFeeder;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$config = require __DIR__ . '/config.php';
$db = new MysqliDb($config['mysql']);

$data = json_decode(file_get_contents('database/sample.json'), true);

$feeder = new NamesFeeder($db);

foreach ($data as $record) {
    $names = json_decode($record['names'], true);
    $hits = json_decode($record['hits'], true);

    $feeder->batchInput($names, $hits);
}
