<?php

require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

function run_sql_file($fileName)
{
    $mysql_config = (require __DIR__ . '/../config.php')['mysql'];
    $db = new PDO("mysql:host={$mysql_config['host']};dbname={$mysql_config['db']}", $mysql_config['username'], $mysql_config['password']);
    $stmt = $db->prepare(file_get_contents(__DIR__ . "/{$fileName}"));
    $stmt->execute();
}
