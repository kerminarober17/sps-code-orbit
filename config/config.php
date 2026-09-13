<?php
// Configuration settings for SPS Code Orbit

// Load .env file if it exists
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        if (strpos($line, '=') === false) {
            continue;
        }
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        // Remove quotes if present
        if (preg_match('/^"(.*)"$/', $value, $matches) || preg_match("/^'(.*)'$/", $value, $matches)) {
            $value = $matches[1];
        }
        putenv("$name=$value");
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}

// Database configuration
define('DB_HOST', getenv('DB_HOST') ?: 'sql301.infinityfree.com');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DB_NAME', getenv('DB_NAME') ?: 'if0_42844705_sps_code_orbit');
define('DB_USER', getenv('DB_USER') ?: 'if0_42844705');
define('DB_PASSWORD', getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : 'VqdoPiNVjSGQd');
define('DB_CHARSET', getenv('DB_CHARSET') ?: 'utf8mb4');

// Application settings
define('APP_NAME', getenv('APP_NAME') ?: 'SPS Code Orbit');
define('APP_ENV', getenv('APP_ENV') ?: 'production');

// Session settings
define('SESSION_NAME', getenv('SESSION_NAME') ?: 'sps_session');
define('SESSION_LIFETIME', (int)(getenv('SESSION_LIFETIME') ?: 86400)); // 1 day default

