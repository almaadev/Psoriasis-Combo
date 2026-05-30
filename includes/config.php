<?php
/**
 * Psoriasis-Combo Centralized Configuration
 * Handles session management, URL resolution, and environment constants.
 */

// Centralized session handling with security hardening
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] === 'on' || $_SERVER['SERVER_PORT'] == 443),
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// Dynamically resolve BASE_URL to work seamlessly on shared hosting, subdirectories, or localhost
if (!defined('BASE_URL')) {
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    // If running CLI or empty, default to root
    if (empty($scriptName)) {
        define('BASE_URL', '/');
    } else {
        $baseDir = dirname($scriptName);
        $baseDir = str_replace('\\', '/', $baseDir);
        // Special case for root files (dirname returns "/" or "\")
        $baseUrl = ($baseDir === '/' || $baseDir === '\\') ? '/' : rtrim($baseDir, '/') . '/';
        define('BASE_URL', $baseUrl);
    }
}

// Asset and resources URL definitions
if (!defined('ASSET_URL')) {
    define('ASSET_URL', BASE_URL . 'assets/');
}

if (!defined('IMAGE_URL')) {
    define('IMAGE_URL', ASSET_URL . 'images/');
}

if (!defined('API_URL')) {
    define('API_URL', 'https://almaherbal.top/Staging-App/api.php');
}
