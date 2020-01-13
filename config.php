<?php

return [
    'mysql' => [
        'host' => getenv('MYSQL_HOST') ?: 'localhost',
        'db' => getenv('MYSQL_DATABASE') ?: 'translate-db',
        'username' => getenv('MYSQL_USER') ?: 'user',
        'password' => getenv('MYSQL_PASSWORD') ?: 'password',
    ]
];