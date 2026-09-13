<?php
require_once __DIR__ . '/config.php';

function get_db_connection() {
    $host = DB_HOST;
    $port = DB_PORT;
    $db   = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASSWORD;
    $charset = DB_CHARSET;

    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset;connect_timeout=5";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        // Do not expose database errors directly to the client in production
        if (APP_ENV === 'development') {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        } else {
            // Log error internally and return generic message
            throw new \Exception('Database connection error.');
        }
    }
}
