<?php
/**
 * Modern Secure Checkout
 * Modularized version that imports dependencies from includes/ layout.
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

// Retrieve product ID from session or default to 96
$product_id = $_SESSION['product_id'] ?? 96;

// Catch the hidden quantity from the landing page post trigger
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['qty'])) {
    $_SESSION['qty'] = $_POST['qty'];
}

// Access the quantity securely
$qty = $_SESSION['qty'] ?? 1;

// Setup stylesheets to load in head.php
$pageStyles = [
    ASSET_URL . 'css/bootstrap.min.css',
    ASSET_URL . 'css/magnific-popup.css',
    ASSET_URL . 'css/swiper-bundle.min.css',
    ASSET_URL . 'css/slick.css',
    ASSET_URL . 'css/default-icons.css',
    ASSET_URL . 'css/default.css',
    ASSET_URL . 'css/sal.css',
    ASSET_URL . 'css/tg-cursor.css',
    ASSET_URL . 'css/main.css',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
    ASSET_URL . 'css/checkout.css'
];

// Setup scripts to load at bottom of page
$pageScripts = [
    'https://checkout.razorpay.com/v1/checkout.js',
    ASSET_URL . 'js/checkout.js?v=' . time()
];

$metaTitle = "Secure Checkout | Almaa Herbal";
$metaDescription = "Complete your purchase and take the first step toward healthier skin.";

require_once __DIR__ . '/includes/head.php';
?>
<body>
    <!-- Preloader -->
    <div id="preloader" style="display:none !important;">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon">
                    <h2 style="color:white;">Almaa Herbal</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll-top trigger -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 11L6 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M1 6L6 1L11 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <!-- Main Checkout Section -->
    <main class="main-area fix">
        <section class="checkout-area-modern">
            <div class="checkout-container">
                
                <!-- Page Title Header -->
                <div class="checkout-header">
                    <h1>Secure Your Order</h1>
                    <p>Complete your purchase and take the first step toward healthier skin 💪</p>
                </div>

                <!-- Main Layout Grid -->
                <div class="checkout-grid">

                    <!-- Left Column - Shipping Details Form -->
                    <div class="checkout-card">
                        <h2>Shipping Details</h2>
                        <form>
                            <div class="form-group">
                                <input type="text" id="phone" class="modern-input" placeholder="Mobile Number *">
                            </div>
                            <div class="form-group">
                                <input type="email" id="email" class="modern-input" placeholder="Email Address">
                            </div>
                            
                            <!-- Address inputs exposed progressively on valid contact info -->
                            <div id="hidden-fields" style="display:none;">
                                <div class="two-grid">
                                    <div class="form-group">
                                        <input type="text" id="f-name" class="modern-input" placeholder="First Name *">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="l-name" class="modern-input" placeholder="Last Name *">
                                    </div>
                                </div>
                                <div class="two-grid">
                                    <div class="form-group">
                                        <input type="text" id="door-no" class="modern-input" placeholder="Door No *">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="street" class="modern-input" placeholder="Street *">
                                    </div>
                                </div>
                                <div class="two-grid">
                                    <div class="form-group">
                                        <input type="text" id="location" class="modern-input" placeholder="Location *">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="city" class="modern-input" placeholder="City *">
                                    </div>
                                </div>
                                <div class="two-grid">
                                    <div class="form-group">
                                        <select id="state" class="modern-input">
                                            <option value="">State *</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="pincode" class="modern-input" placeholder="Postal code *">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Right Column - Order Price Summary -->
                    <div class="checkout-summary">
                        <h2>Order Summary</h2>
                        <div class="summary-top">
                            <div>
                                <div id="order-item-name" class="product-name">Product</div>
                            </div>
                            <div class="summary-price">₹<span id="item-price">0</span></div>
                        </div>

                        <!-- Quantity Selector -->
                        <div class="qty-row">
                            <button id="qty-minus" type="button" class="qty-btn">-</button>
                            <input id="qty-input" type="text" value="<?= htmlspecialchars($qty) ?>" readonly class="qty-input">
                            <button id="qty-plus" type="button" class="qty-btn">+</button>
                        </div>

                        <!-- Pricing Breakdown -->
                        <div class="price-box">
                            <!-- <div class="price-row">
                                <span>Price per Pack</span>
                                <span>₹<span id="price-per-pack">0</span></span>
                            </div> -->
                            <div class="price-row">
                                <span>Shipping</span>
                                <span>₹<span id="shipping-cost">0</span></span>
                            </div>
                            <div class="total-row">
                                <span>Total</span>
                                <span>₹<span id="total-price">0</span></span>
                            </div>
                        </div>

                        <!-- Payment Method Toggle -->
                        <div class="payment-wrapper">
                            <label>Payment Method</label>
                            <div class="payment-grid">
                                <div class="payment-option active" data-method="online">Online Payment</div>
                                <div class="payment-option" data-method="cod">Cash on Delivery</div>
                            </div>
                        </div>

                        <!-- CTA Order Trigger Button -->
                        <button id="cmd-place-order" type="button" class="place-order-btn">Place Order</button>
                        <div class="delivery-text">🚚 Free Delivery on All Prepaid Orders</div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <!-- Address Multi-Selection Dialog Modal -->
    <div id="addressModal" class="addr-overlay" aria-hidden="true" role="dialog">
        <div class="addr-dialog">
            <div class="addr-header">
                <span class="addr-title">Select Your Address</span>
                <button type="button" class="addr-close" id="addr-close-btn" aria-label="Close">&#x2715;</button>
            </div>
            <p class="addr-sub">We found saved addresses for your details. Pick one or enter a new address below.</p>
            <div id="address-list-container" class="addr-list">
                <!-- Dynamically populated cards -->
            </div>
            <div class="addr-footer">
                <button type="button" class="addr-btn-cancel" id="addr-cancel-btn">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Bridge PHP constants safely to JavaScript global scope -->
    <script>
        window.API_URL = "<?= API_URL ?>";
        window.PRODUCT_ID = "<?= $product_id ?>";
    </script>

    <!-- Global popup modal and universal script loads -->
    <?php require_once __DIR__ . '/includes/popup.php'; ?>
    <?php require_once __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>