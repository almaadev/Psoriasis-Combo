<?php
/**
 * Main Landing Page - Psoriasis Combo
 * Refactored modular layout importing partial views from includes/.
 */
require_once __DIR__ . '/includes/config.php';

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
