<?php
/**
 * Main Landing Page - Psoriasis Combo
 * Refactored modular layout importing partial views from includes/.
 */
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

// === Set product ID manually here ===
$product_id = 96; // <-- change this to any product ID you want
$_SESSION['product_id'] = $product_id;

// Configure page-specific metadata
$metaTitle = "Psoriasis Care Combo | Almaa Herbal";
$metaDescription = "A traditional herbal combination to support skin comfort and healthier skin appearance. Natural Siddha care.";
$metaKeywords = "psoriasis, skin scaling, skin flaking, dry skin relief, sivanar vembu, psora oil, herbal combo";

// Configure page-specific scripts
$pageScripts = [
    ASSET_URL . 'js/landing.js'
];

// Load page header and standard CDN assets
require_once __DIR__ . '/includes/head.php';
?>
<body class="overflow-x-hidden">

  <!-- Header Navigation -->
  <?php require_once __DIR__ . '/includes/header.php'; ?>

  <!-- Main Content Sections -->
  <main class="">
    <?php require_once __DIR__ . '/includes/hero.php'; ?>
    <?php require_once __DIR__ . '/includes/order-form.php'; ?>
    <?php require_once __DIR__ . '/includes/about.php'; ?>
    <?php require_once __DIR__ . '/includes/ingredients.php'; ?>
    <?php require_once __DIR__ . '/includes/benefits.php'; ?>
    <?php require_once __DIR__ . '/includes/how-to-use.php'; ?>
    <?php require_once __DIR__ . '/includes/testimonials.php'; ?>
    <?php require_once __DIR__ . '/includes/faq.php'; ?>
    <?php require_once __DIR__ . '/includes/cta.php'; ?>
    <?php require_once __DIR__ . '/includes/contact.php'; ?>
  </main>

  <!-- Footer, Global Reusable Modal and Scripts -->
  <?php require_once __DIR__ . '/includes/footer.php'; ?>
  <?php require_once __DIR__ . '/includes/popup.php'; ?>
  <?php require_once __DIR__ . '/includes/scripts.php'; ?>

</body>
</html>
