<?php
require_once dirname(__DIR__) . '/config.php';

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
