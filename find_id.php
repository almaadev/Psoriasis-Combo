<?php
// Defensive dynamic config locator
$config_found = false;
$search_paths = [
    __DIR__ . '/../config.php',
    __DIR__ . '/../../config.php',
    __DIR__ . '/../../../config.php',
    __DIR__ . '/config.php'
];

foreach ($search_paths as $path) {
    if (file_exists($path)) {
        require_once $path;
        $config_found = true;
        break;
    }
}

// Fallback configuration if no config file is found or if API_URL isn't defined
if (!defined('API_URL')) {
    define('API_URL', 'https://almaherbal.top/Staging-App/api.php');
}

// Define asset paths for this module
if (!defined('BASE_URL')) {
    define('BASE_URL', '');
}
if (!defined('ASSET_URL')) {
    define('ASSET_URL', 'assets/');
}
if (!defined('IMAGE_URL')) {
    define('IMAGE_URL', 'assets/images/');
}

$url = API_URL . "?gofor=productslist";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
if (is_array($data)) {
    // Print all products
    echo "<h1>Products List:</h1><ul>";
    foreach ($data as $product) {
        $name = $product['product_name'] ?? $product['name'] ?? 'Unknown';
        $id = $product['product_id'] ?? $product['id'] ?? 'Unknown';
        echo "<li>ID: <strong>$id</strong> - Name: $name</li>";
    }
    echo "</ul>";
} else {
    echo "Invalid response: " . htmlspecialchars($response);
}
