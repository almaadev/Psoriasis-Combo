<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Catch the hidden quantity from the landing page
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['qty'])) {
    $_SESSION['qty'] = $_POST['qty'];
}

// Access the quantity securely
$qty = $_SESSION['qty'] ?? 1;

include __DIR__ . '/../config.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout | Almaa Herbal</title>
    <meta name="description" content="Almaa Herbal - Checkout">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" type="image/png" href="assets/img/almaapics/mdlogo.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/default-icons.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/sal.css">
    <link rel="stylesheet" href="assets/css/tg-cursor.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MHGLXFBS');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <script>
        fbq('track', 'InitiateCheckout');
    </script>
    <!--Preloader - hidden immediately so it never blocks page-->
    <div id="preloader" style="display:none !important;">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon">
                    <h2 style="color:white;">Almaa Herbal</h2>
                </div>
            </div>
        </div>
    </div>
    <!--Preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 11L6 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M1 6L6 1L11 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <!-- header -->

    <style>
        /* Specific overrides for checkout if needed */
        /* Make transparent header links and icons dark on checkout page */
        #sticky-header:not(.sticky-menu) .custom-nav-links .nav-link,
        #sticky-header:not(.sticky-menu) .custom-offcanvas-btn,
        #sticky-header:not(.sticky-menu) .navbar-brand {
            color: #111111 !important;
        }

        #sticky-header:not(.sticky-menu) .navbar-toggler svg path {
            stroke: #111111 !important;
        }

        #sticky-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
        }

        .payment__method .form-check {
            display: flex;
            align-items: center;
        }

        .payment__method .form-check-input {
            width: 18px !important;
            height: 18px !important;
            border-radius: 50% !important;
            margin-top: 0;
            margin-right: 10px;
            flex-shrink: 0;
            border: 1px solid rgba(34, 34, 34, 0.15);
        }

        .payment__method .form-check-input:checked {
            background-color: var(--tg-theme-primary);
            border-color: var(--tg-theme-primary);
        }
    </style>


    <!-- main-area -->
    <main class="main-area fix">

        <section class="checkout-area-modern">

            <div class="checkout-container">

                <!-- TITLE -->
                <div class="checkout-header">
                    <h1>Secure Your Order</h1>
                    <p>Complete your purchase and take the first step toward healthier skin 💪</p>
                </div>

                <!-- MAIN GRID -->
                <div class="checkout-grid">

                    <!-- LEFT -->
                    <div class="checkout-card">

                        <h2>Shipping Details</h2>

                        <form>

                            <div class="form-group">
                                <input type="text" id="phone" class="modern-input" placeholder="Mobile Number *">
                            </div>

                            <div class="form-group">
                                <input type="email" id="email" class="modern-input" placeholder="Email Address">
                            </div>

                            <div id="hidden-fields">

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

                    <!-- RIGHT -->
                    <div class="checkout-summary">

                        <h2>Order Summary</h2>

                        <div class="summary-top">
                            <div>
                                <div id="order-item-name" class="product-name">Product</div>
                            </div>
                            <div class="summary-price">₹<span id="item-price">0</span></div>
                        </div>

                        <!-- QTY -->
                        <div class="qty-row">
                            <button id="qty-minus" type="button" class="qty-btn">-</button>
                            <input id="qty-input" type="text" value="1" readonly class="qty-input">
                            <button id="qty-plus" type="button" class="qty-btn">+</button>
                        </div>

                        <!-- PRICE -->
                        <div class="price-box">
                            <div class="price-row">
                                <span>Price per Pack</span>
                                <span>₹<span id="price-per-pack">0</span></span>
                            </div>
                            <div class="price-row">
                                <span>Shipping</span>
                                <span>₹<span id="shipping-cost">0</span></span>
                            </div>
                            <div class="total-row">
                                <span>Total</span>
                                <span>₹<span id="total-price">0</span></span>
                            </div>
                        </div>

                        <!-- PAYMENT -->
                        <div class="payment-wrapper">
                            <label>Payment Method</label>
                            <div class="payment-grid">
                                <div class="payment-option active" data-method="online">Online Payment</div>
                                <div class="payment-option" data-method="cod">Cash on Delivery</div>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <button id="cmd-place-order" type="button" class="place-order-btn">Place Order</button>

                        <div class="delivery-text">🚚 Free Delivery on All Prepaid Orders</div>

                    </div><!-- /checkout-summary -->

                </div><!-- /checkout-grid -->

            </div><!-- /checkout-container -->

        </section><!-- /checkout-area-modern -->

        <style>
            .checkout-area-modern {
                background: #f5f5f5;
                min-height: 100vh;
                padding: 140px 20px 80px;
            }

            .checkout-container {
                max-width: 1400px;
                margin: auto;
            }

            .checkout-header {
                text-align: center;
                margin-bottom: 50px;
            }

            .checkout-header h1 {
                font-size: 56px;
                font-weight: 800;
                color: #111;
            }

            .checkout-header p {
                font-size: 18px;
                color: #666;
                margin-top: 10px;
            }

            .checkout-grid {
                display: grid;
                grid-template-columns: 1fr 520px;
                gap: 40px;
                align-items: start;
            }

            .checkout-card,
            .checkout-summary {
                background: #fff;
                border-radius: 28px;
                padding: 40px;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
            }

            .checkout-summary {
                position: sticky;
                top: 120px;
            }

            .checkout-card h2,
            .checkout-summary h2 {
                font-size: 42px;
                font-weight: 800;
                margin-bottom: 35px;
                color: #111;
            }

            .form-group {
                margin-bottom: 24px;
            }

            .two-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }

            .modern-input {
                width: 100%;
                height: 64px;
                border: 1px solid #ddd;
                border-radius: 18px;
                padding: 0 22px;
                font-size: 18px;
                background: #fff;
                transition: 0.3s;
                box-sizing: border-box;
            }

            .modern-input:focus {
                outline: none;
                border-color: #176803;
                box-shadow: 0 0 0 4px rgba(23, 104, 3, 0.12);
            }

            .summary-top {
                display: flex;
                justify-content: space-between;
                gap: 20px;
                margin-bottom: 30px;
            }

            .product-name {
                font-size: 28px;
                font-weight: 700;
                color: #176803;
                line-height: 1.4;
            }

            .summary-price {
                font-size: 32px;
                font-weight: 800;
                color: #176803;
            }

            .qty-row {
                display: flex;
                align-items: center;
                gap: 14px;
                margin-bottom: 35px;
            }

            .qty-btn {
                width: 52px;
                height: 52px;
                border: none;
                border-radius: 12px;
                background: #176803;
                color: #fff;
                font-size: 28px;
                font-weight: 700;
                cursor: pointer;
            }

            .qty-input {
                width: 70px;
                height: 52px;
                border: 1px solid #ddd;
                border-radius: 12px;
                text-align: center;
                font-size: 22px;
                font-weight: 700;
            }

            .price-box {
                margin-bottom: 35px;
            }

            .price-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 18px;
                font-size: 22px;
            }

            .total-row {
                display: flex;
                justify-content: space-between;
                border-top: 1px solid #ddd;
                padding-top: 24px;
                margin-top: 24px;
                font-size: 36px;
                font-weight: 800;
                color: #176803;
            }

            .payment-wrapper {
                margin-bottom: 35px;
            }

            .payment-wrapper label {
                display: block;
                margin-bottom: 16px;
                font-size: 20px;
                font-weight: 700;
            }

            .payment-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 18px;
            }

            .payment-option {
                height: 64px;
                border: 2px solid #176803;
                border-radius: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                font-weight: 700;
                cursor: pointer;
                transition: 0.3s;
                color: #176803;
                background: #fff;
            }

            .payment-option.active {
                background: #176803;
                color: #fff;
            }

            .place-order-btn {
                width: 100%;
                height: 68px;
                border: none;
                border-radius: 18px;
                background: #176803;
                color: #fff;
                font-size: 28px;
                font-weight: 800;
                cursor: pointer;
                transition: 0.3s;
            }

            .place-order-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(23, 104, 3, 0.2);
            }

            .delivery-text {
                text-align: center;
                margin-top: 18px;
                color: #176803;
                font-size: 18px;
                font-weight: 600;
            }

            @media(max-width:1100px) {
                .checkout-grid {
                    grid-template-columns: 1fr;
                }

                .checkout-summary {
                    position: relative;
                    top: 0;
                }
            }

            @media(max-width:768px) {
                .checkout-area-modern {
                    padding: 100px 16px 60px;
                }

                .checkout-header h1 {
                    font-size: 36px;
                }

                .checkout-card,
                .checkout-summary {
                    padding: 24px;
                }

                .checkout-card h2,
                .checkout-summary h2 {
                    font-size: 28px;
                }

                .two-grid {
                    grid-template-columns: 1fr;
                }

                .payment-grid {
                    grid-template-columns: 1fr;
                }

                .modern-input {
                    height: 56px;
                    font-size: 16px;
                }

                .total-row {
                    font-size: 28px;
                }

                .place-order-btn {
                    height: 60px;
                    font-size: 22px;
                }
            }
        </style>

        <!-- Address Selection Modal (custom overlay) -->
        <div id="addressModal" class="addr-overlay" aria-hidden="true">
            <div class="addr-dialog">

                <div class="addr-header">
                    <span class="addr-title">Select Your Address</span>
                    <button type="button" class="addr-close" id="addr-close-btn" aria-label="Close">&#x2715;</button>
                </div>

                <p class="addr-sub">We found saved addresses for your details. Pick one or enter a new address below.
                </p>

                <div id="address-list-container" class="addr-list">
                    <!-- JS populates cards here -->
                </div>

                <div class="addr-footer">
                    <button type="button" class="addr-btn-cancel" id="addr-cancel-btn">Cancel</button>
                </div>

            </div>
        </div>

        <style>
            /* ── Address Modal Overlay ── */
            .addr-overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.55);
                z-index: 9999;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }

            .addr-overlay.open {
                display: flex;
            }

            .addr-dialog {
                background: #fff;
                border-radius: 24px;
                width: 100%;
                max-width: 520px;
                max-height: 90vh;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                box-shadow: 0 24px 60px rgba(0, 0, 0, 0.18);
                animation: addrSlideIn 0.25s ease;
            }

            @keyframes addrSlideIn {
                from {
                    transform: translateY(30px);
                    opacity: 0;
                }

                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            .addr-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 24px 28px 0;
            }

            .addr-title {
                font-size: 22px;
                font-weight: 800;
                color: #111;
            }

            .addr-close {
                width: 36px;
                height: 36px;
                border: none;
                background: #f5f5f5;
                border-radius: 50%;
                font-size: 16px;
                cursor: pointer;
                color: #555;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: background 0.2s;
            }

            .addr-close:hover {
                background: #ebebeb;
            }

            .addr-sub {
                padding: 10px 28px 16px;
                font-size: 14px;
                color: #888;
                margin: 0;
            }

            .addr-list {
                overflow-y: auto;
                padding: 0 28px;
                flex: 1;
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .addr-card {
                border: 2px solid #e8e8e8;
                border-radius: 16px;
                padding: 16px 18px;
                cursor: pointer;
                transition: all 0.2s;
                background: #fff;
                text-align: left;
            }

            .addr-card:hover {
                border-color: #176803;
                background: #f4fbf2;
            }

            .addr-card.selected {
                border-color: #176803;
                background: #f4fbf2;
            }

            .addr-card-line1 {
                font-size: 15px;
                font-weight: 700;
                color: #111;
                margin-bottom: 4px;
            }

            .addr-card-line2 {
                font-size: 13px;
                color: #777;
            }

            .addr-new-btn {
                border: 2px dashed #ccc;
                border-radius: 16px;
                padding: 14px 18px;
                cursor: pointer;
                background: #fff;
                color: #176803;
                font-size: 14px;
                font-weight: 700;
                text-align: center;
                transition: all 0.2s;
                margin-bottom: 4px;
            }

            .addr-new-btn:hover {
                border-color: #176803;
                background: #f4fbf2;
            }

            .addr-footer {
                padding: 20px 28px 24px;
                display: flex;
                justify-content: flex-end;
            }

            .addr-btn-cancel {
                height: 44px;
                padding: 0 24px;
                border: 2px solid #ddd;
                border-radius: 12px;
                background: #fff;
                color: #555;
                font-size: 15px;
                font-weight: 700;
                cursor: pointer;
                transition: 0.2s;
            }

            .addr-btn-cancel:hover {
                border-color: #999;
                color: #111;
            }
        </style>
    </main>
    <!-- main-area-end -->

    <!-- footer -->

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // ─────────────────────────────────────────────
            // CONFIG
            // ─────────────────────────────────────────────
            const API_URL = "<?php echo API_URL; ?>";

            // ─────────────────────────────────────────────
            // fetchJson: safe wrapper – never throws unhandled
            // ─────────────────────────────────────────────
            async function fetchJson(url, options = {}) {
                const res = await fetch(url, options);
                const text = await res.text();
                try {
                    return JSON.parse(text);
                } catch (e) {
                    console.error("fetchJson parse error for", url, ":", text);
                    throw new Error("Invalid JSON response from server.");
                }
            }

            // ─────────────────────────────────────────────
            // STATE
            // ─────────────────────────────────────────────
            let fetchedCustomerId = null;   // set when auto-fill finds a customer
            let selectedAddressId = null;   // set when user selects/auto-fills an address

            // ─────────────────────────────────────────────
            // 1. STATE DROPDOWN
            // ─────────────────────────────────────────────
            const stateSelect = document.getElementById("state");
            const states = [
                "Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar",
                "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli and Daman and Diu", "Delhi", "Goa",
                "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka",
                "Kerala", "Ladakh", "Lakshadweep", "Madhya Pradesh", "Maharashtra", "Manipur",
                "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Puducherry", "Punjab", "Rajasthan",
                "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh", "Uttarakhand",
                "West Bengal", "Other"
            ];

            if (stateSelect) {
                while (stateSelect.options.length > 1) stateSelect.remove(1);
                states.forEach(st => {
                    const o = document.createElement("option");
                    o.value = st;
                    o.text = st;
                    stateSelect.add(o);
                });
                stateSelect.addEventListener("change", updateCheckoutSummary);
            }

            // ─────────────────────────────────────────────
            // 2. PRODUCT DATA & QUANTITY (API + localStorage)
            // ─────────────────────────────────────────────
            let landingProduct = {};
            let qty = 1;

            async function initProduct() {
                try {
                    // Try to fetch from API first to get latest details
                    const response = await fetch(`${API_URL}?gofor=productdetail&url_name=piles-free-constipation-solution`);
                    const data = await response.json();

                    if (data && data.product_details && data.product_details[0]) {
                        const product = data.product_details[0];
                        const attr = data.product_attributes ? data.product_attributes[0] : {};

                        landingProduct.id = product.product_id;
                        landingProduct.name = product.product_name;
                        landingProduct.price = parseFloat(attr.selling_price) || 2427.00;
                        landingProduct.unit = attr.prod_attri_id || "";

                        console.log("Product data fetched from API:", landingProduct);
                    } else {
                        throw new Error("Invalid API response");
                    }
                } catch (e) {
                    console.error("Error fetching product from API, using local storage fallback:", e);
                    let lpData = localStorage.getItem("landingProduct") || localStorage.getItem("checkout_product");
                    if (lpData === "undefined" || lpData === "null") lpData = null;
                    landingProduct = JSON.parse(lpData || "{}");

                    if (!landingProduct.id || isNaN(landingProduct.id)) {
                        landingProduct.id = 85;
                        if (!landingProduct.name) landingProduct.name = "Natural Piles Care Combo";
                        if (!landingProduct.price) landingProduct.price = 2427.00;
                    }
                }

                // Handle quantity
                const params = new URLSearchParams(window.location.search);
                const urlQty = parseInt(params.get('qty'));

                qty = (urlQty && urlQty > 0) ? urlQty : (parseInt(landingProduct.qty) || 1);
                if (qty > 10) qty = 10;
                if (qty < 1) qty = 1;

                landingProduct.qty = qty;
                updateCheckoutSummary();
            }

            initProduct();

            // Shipping logic
            function calculateShipping(state) {
                return 0; // Force 0 per requirements
            }

            // Update order summary UI
            function updateCheckoutSummary() {
                const price = parseFloat(landingProduct.price) || 0;
                const stateVal = stateSelect ? stateSelect.value : "";
                const shipping = calculateShipping(stateVal);
                const subtotal = price * qty;
                const total = subtotal + shipping;

                const elName = document.getElementById("order-item-name");
                if (elName) elName.innerText = landingProduct.name || "Product";

                const elPrice = document.getElementById("item-price");
                if (elPrice) elPrice.innerText = subtotal.toFixed(2); // In original, item-price shows "unitPrice * qty"

                const elQty = document.getElementById("qty-input");
                if (elQty) elQty.value = qty;

                const elShipping = document.getElementById("shipping-cost");
                if (elShipping) elShipping.innerText = shipping.toFixed(2);

                const elTotal = document.getElementById("total-price");
                if (elTotal) elTotal.innerText = total.toFixed(2);
            }

            // Qty +/- buttons
            window.adjustCheckoutQty = function (change) {
                qty += change;
                if (qty < 1) qty = 1;
                if (qty > 10) {
                    qty = 10;
                    alert("You can only add up to 10 items.");
                }
                landingProduct.qty = qty;
                localStorage.setItem("landingProduct", JSON.stringify(landingProduct));
                updateCheckoutSummary();
            };

            const qtyMinus = document.getElementById("qty-minus");
            const qtyPlus = document.getElementById("qty-plus");

            if (qtyMinus) {
                qtyMinus.addEventListener("click", function (e) {
                    e.preventDefault();
                    window.adjustCheckoutQty(-1);
                });
            }

            if (qtyPlus) {
                qtyPlus.addEventListener("click", function (e) {
                    e.preventDefault();
                    window.adjustCheckoutQty(1);
                });
            }

            // Payment Method Selection Logic
            const paymentOptions = document.querySelectorAll('.payment-option');

            paymentOptions.forEach(option => {
                option.addEventListener('click', function () {
                    paymentOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            updateCheckoutSummary();

            // ─────────────────────────────────────────────
            // 3. PROGRESSIVE DISCLOSURE
            // ─────────────────────────────────────────────
            const hiddenFields = document.getElementById("hidden-fields");
            const emailInput = document.getElementById("email");
            const mobileInput = document.getElementById("phone");

            function revealAddressFields() {
                if (hiddenFields) hiddenFields.style.display = "block";
            }

            // ─────────────────────────────────────────────
            // Address overlay helpers
            // ─────────────────────────────────────────────
            function openAddressModal() {
                const overlay = document.getElementById("addressModal");
                if (overlay) {
                    overlay.classList.add("open");
                    overlay.setAttribute("aria-hidden", "false");
                    document.body.style.overflow = "hidden";
                }
            }

            function closeAddressModal() {
                const overlay = document.getElementById("addressModal");
                if (overlay) {
                    overlay.classList.remove("open");
                    overlay.setAttribute("aria-hidden", "true");
                    document.body.style.overflow = "";
                }
            }

            // Wire close & cancel buttons
            const addrCloseBtn = document.getElementById("addr-close-btn");
            const addrCancelBtn = document.getElementById("addr-cancel-btn");
            if (addrCloseBtn) addrCloseBtn.addEventListener("click", closeAddressModal);
            if (addrCancelBtn) addrCancelBtn.addEventListener("click", closeAddressModal);

            // Close on backdrop click
            document.getElementById("addressModal").addEventListener("click", function (e) {
                if (e.target === this) closeAddressModal();
            });

            // Email validation
            emailInput.addEventListener("input", function () {
                const emailVal = emailInput.value.trim();
                if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
                    revealAddressFields();
                }
            });

            // Mobile validation
            mobileInput.addEventListener("input", function () {
                const mobileVal = mobileInput.value.trim();
                if (/^\d{10}$/.test(mobileVal)) {
                    revealAddressFields();
                }
            });

            // ─────────────────────────────────────────────
            // 4. AUTO-FILL: blur on email / mobile
            // ─────────────────────────────────────────────

            // Populates form fields from an address+customer object
            function populateAddress(addr) {
                const set = (id, val) => {
                    const el = document.getElementById(id);
                    if (el) el.value = val || "";
                };
                set("door-no", addr.doorno);
                set("street", addr.street);
                set("location", addr.location);
                set("city", addr.city);
                set("pincode", addr.pincode);

                if (stateSelect && addr.state) {
                    // Try to select matching state option
                    for (let i = 0; i < stateSelect.options.length; i++) {
                        if (stateSelect.options[i].value === addr.state) {
                            stateSelect.selectedIndex = i;
                            break;
                        }
                    }
                    updateCheckoutSummary();
                }

                selectedAddressId = addr.address_id || addr.id || null;
                if (!selectedAddressId) console.warn("Address auto-fill: address_id missing in response");
            }

            function isTemporaryEmail(email, mobile) {
                if (!email || !mobile) return false;
                return email.trim().toLowerCase() === `${mobile.trim()}@gmail.com`;
            }

            // Locks customer fields after auto-fill (prevents customer mismatch)
            function lockCustomerFields(isTempEmail = false) {
                const fn = document.getElementById("f-name");
                const ln = document.getElementById("l-name");
                const em = document.getElementById("email");
                if (fn) { fn.readOnly = true; fn.classList.add("autofill-locked"); fn.style.backgroundColor = '#e9ecef'; fn.style.opacity = '0.7'; fn.style.cursor = 'not-allowed'; }
                if (ln) { ln.readOnly = true; ln.classList.add("autofill-locked"); ln.style.backgroundColor = '#e9ecef'; ln.style.opacity = '0.7'; ln.style.cursor = 'not-allowed'; }
                if (em) {
                    if (isTempEmail) {
                        em.readOnly = false; em.classList.remove("autofill-locked"); em.style.backgroundColor = ''; em.style.opacity = ''; em.style.cursor = '';
                    } else {
                        em.readOnly = true; em.classList.add("autofill-locked"); em.style.backgroundColor = '#e9ecef'; em.style.opacity = '0.7'; em.style.cursor = 'not-allowed';
                    }
                }
            }

            // Unlocks customer fields (called when user manually edits email/mobile)
            function unlockCustomerFields() {
                const fn = document.getElementById("f-name");
                const ln = document.getElementById("l-name");
                const em = document.getElementById("email");
                if (fn) { fn.readOnly = false; fn.classList.remove("autofill-locked"); fn.style.backgroundColor = ''; fn.style.opacity = ''; fn.style.cursor = ''; }
                if (ln) { ln.readOnly = false; ln.classList.remove("autofill-locked"); ln.style.backgroundColor = ''; ln.style.opacity = ''; ln.style.cursor = ''; }
                if (em) { em.readOnly = false; em.classList.remove("autofill-locked"); em.style.backgroundColor = ''; em.style.opacity = ''; em.style.cursor = ''; }
            }

            // Fetch customer by ID and populate fields
            async function fetchAndPopulateCustomer(customerId) {
                try {
                    const data = await fetchJson(`${API_URL}?gofor=customersget&customer_id=${encodeURIComponent(customerId)}`);
                    if (data) {
                        const fn = document.getElementById("f-name");
                        const ln = document.getElementById("l-name");
                        const em = document.getElementById("email");
                        const mo = document.getElementById("phone");

                        if (fn) fn.value = data.first_name || data.fname || "";
                        if (ln) ln.value = data.last_name || data.lname || "";
                        
                        const fetchedEmail = data.email || "";
                        const currentMobile = (mo ? mo.value.trim() : "") || (data.mobilenumber || data.phone || "");

                        const isTemp = isTemporaryEmail(fetchedEmail, currentMobile);

                        // If backend returns an official email (not temp), autofill
                        if (fetchedEmail && !isTemp) {
                            if (em) em.value = fetchedEmail;
                        } else {
                            // If backend email is temporary, only autofill if empty
                            if (em && !em.value) em.value = fetchedEmail;
                        }

                        lockCustomerFields(isTemp);

                        if (mo && !mo.value) mo.value = data.mobilenumber || data.phone || "";

                        fetchedCustomerId = customerId;
                    }
                } catch (err) {
                    console.error("fetchAndPopulateCustomer error:", err);
                }
            }

            // Handle address list response (0, 1, or many)
            function handleAddressList(addresses) {
                if (!Array.isArray(addresses) || addresses.length === 0) {
                    // No match – user fills manually
                    return;
                }

                if (addresses.length === 1) {
                    // Exactly 1 match – auto-fill silently
                    populateAddress(addresses[0]);
                    revealAddressFields();
                    if (addresses[0].customer_id) {
                        fetchAndPopulateCustomer(addresses[0].customer_id);
                    }
                    return;
                }

                // Multiple matches – show custom overlay
                const container = document.getElementById("address-list-container");
                if (!container) return;

                container.innerHTML = "";
                addresses.forEach((addr) => {
                    const card = document.createElement("button");
                    card.type = "button";
                    card.className = "addr-card";
                    card.innerHTML = `
                        <div class="addr-card-line1">${addr.doorno || ""}, ${addr.street || ""}</div>
                        <div class="addr-card-line2">${addr.city || ""}, ${addr.state || ""} &ndash; ${addr.pincode || ""}</div>
                    `;
                    card.addEventListener("click", function () {
                        populateAddress(addr);
                        revealAddressFields();
                        if (addr.customer_id) {
                            fetchAndPopulateCustomer(addr.customer_id);
                        }
                        closeAddressModal();
                    });
                    container.appendChild(card);
                });

                // Option to enter a new address
                const newBtn = document.createElement("button");
                newBtn.type = "button";
                newBtn.className = "addr-new-btn";
                newBtn.textContent = "+ Use a different address";
                newBtn.addEventListener("click", function () {
                    selectedAddressId = null;
                    closeAddressModal();
                });
                container.appendChild(newBtn);

                openAddressModal();
            }

            // Trigger auto-fill on blur
            async function triggerAutoFill(type, value) {
                try {
                    const param = type === "email"
                        ? `email=${encodeURIComponent(value)}`
                        : `mobilenumber=${encodeURIComponent(value)}`;

                    const data = await fetchJson(`${API_URL}?gofor=addresslist_by_contact&${param}`);

                    // API may return array directly or under a key
                    const list = Array.isArray(data) ? data : (data?.addresses || data?.data || []);
                    handleAddressList(list);
                } catch (err) {
                    console.error("triggerAutoFill error:", err);
                    // Fail silently – user fills manually
                }
            }

            emailInput.addEventListener("blur", function () {
                const emailVal = emailInput.value.trim();
                const mobileVal = mobileInput.value.trim();
                if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal) && !isTemporaryEmail(emailVal, mobileVal)) {
                    triggerAutoFill("email", emailVal);
                }
            });

            mobileInput.addEventListener("blur", function () {
                const mobileVal = mobileInput.value.trim();
                const emailVal = emailInput.value.trim();
                if (/^\d{10}$/.test(mobileVal)) {
                    if (emailVal === "" || isTemporaryEmail(emailVal, mobileVal)) {
                        triggerAutoFill("mobile", mobileVal);
                    }
                }
            });

            // Reset fetchedCustomerId when email or mobile changes
            emailInput.addEventListener("change", function () {
                fetchedCustomerId = null;
                unlockCustomerFields();
            });
            mobileInput.addEventListener("change", function () {
                fetchedCustomerId = null;
                unlockCustomerFields();
            });

            // Watch address fields – reset selectedAddressId if user edits
            ["door-no", "street", "location", "city", "pincode"].forEach(fieldId => {
                const el = document.getElementById(fieldId);
                if (el) {
                    el.addEventListener("input", function () {
                        selectedAddressId = null;
                    });
                }
            });
            if (stateSelect) {
                stateSelect.addEventListener("change", function () {
                    selectedAddressId = null;
                    updateCheckoutSummary();
                });
            }

            // ─────────────────────────────────────────────
            // 5. PLACE ORDER
            // ─────────────────────────────────────────────
            // Robust extraction helpers for API responses
            const getCustomerId = (cust) => {
                if (!cust) return null;
                if (typeof cust === 'string' || typeof cust === 'number') return cust;
                if (Array.isArray(cust) && cust[0]) return getCustomerId(cust[0]);
                return cust.customer_id || cust.id || (cust.data && (cust.data.customer_id || cust.data.id));
            };

            const getAddressId = (addr) => {
                if (!addr) return null;
                if (typeof addr === 'string' || typeof addr === 'number') return addr;
                if (Array.isArray(addr) && addr[0]) return getAddressId(addr[0]);
                return addr.address_id || addr.id || (addr.data && (addr.data.address_id || addr.data.id));
            };

            const getOrderId = (order) => {
                if (!order) return null;
                if (typeof order === 'string' || typeof order === 'number') return order;
                if (Array.isArray(order) && order[0]) return getOrderId(order[0]);
                return order.order_id || order.orderid || order.id || (order.data && (order.data.order_id || order.data.id || order.data.orderid));
            };

            function validateCheckoutForm() {
                // Helper to set error
                function setError(el, msg) {
                    if (el) {
                        el.style.border = "2px solid #dc3545"; // Red border
                        el.focus();
                    }
                    alert(msg);
                    return false;
                }

                // Helper to clear errors
                function clearError(el) {
                    if (el) el.style.border = "";
                }

                const mobileInput = document.getElementById("phone");
                const emailInput = document.getElementById("email");
                const fnameInput = document.getElementById("f-name");
                const lnameInput = document.getElementById("l-name");
                const doorInput = document.getElementById("door-no");
                const streetInput = document.getElementById("street");
                const locationInput = document.getElementById("location");
                const cityInput = document.getElementById("city");
                const stateSelect = document.getElementById("state");
                const pincodeInput = document.getElementById("pincode");

                // Clear all previous errors
                [mobileInput, emailInput, fnameInput, lnameInput, doorInput, streetInput, locationInput, cityInput, stateSelect, pincodeInput].forEach(clearError);

                // 1. Mobile validation (exactly 10 digits, starts with 6,7,8,9)
                const mobileVal = mobileInput ? mobileInput.value.trim() : "";
                if (!/^[6-9]\d{9}$/.test(mobileVal)) {
                    return setError(mobileInput, "Please enter a valid 10 digit Indian mobile number.");
                }

                // 2. Email validation (Optional but must be valid if entered)
                const emailVal = emailInput ? emailInput.value.trim() : "";
                if (emailVal !== "" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
                    return setError(emailInput, "Please enter a valid email address.");
                }

                // 3. First Name (min 2, alphabets + spaces)
                const fnameVal = fnameInput ? fnameInput.value.trim() : "";
                if (!/^[a-zA-Z\s]{2,}$/.test(fnameVal)) {
                    return setError(fnameInput, "Please enter your first name.");
                }

                // 4. Last Name (min 1, alphabets + spaces)
                const lnameVal = lnameInput ? lnameInput.value.trim() : "";
                if (!/^[a-zA-Z\s]{1,}$/.test(lnameVal)) {
                    return setError(lnameInput, "Please enter your last name.");
                }

                // 5. Door Number
                const doorVal = doorInput ? doorInput.value.trim() : "";
                if (doorVal === "") {
                    return setError(doorInput, "Please enter your door number.");
                }

                // 6. Street
                const streetVal = streetInput ? streetInput.value.trim() : "";
                if (streetVal.length < 3) {
                    return setError(streetInput, "Please enter your street name (minimum 3 characters).");
                }

                // 6.5 Location
                const locationVal = locationInput ? locationInput.value.trim() : "";
                if (locationVal.length < 3) {
                    return setError(locationInput, "Please enter your location (minimum 3 characters).");
                }

                // 7. City
                const cityVal = cityInput ? cityInput.value.trim() : "";
                if (!/^[a-zA-Z\s]+$/.test(cityVal)) {
                    return setError(cityInput, "Please enter a valid city name (alphabets only).");
                }

                // 8. State
                const stateVal = stateSelect ? stateSelect.value.trim() : "";
                if (stateVal === "") {
                    return setError(stateSelect, "Please select your state.");
                }

                // 9. Pincode
                const pincodeVal = pincodeInput ? pincodeInput.value.trim() : "";
                if (!/^\d{6}$/.test(pincodeVal)) {
                    return setError(pincodeInput, "Please enter a valid 6 digit pincode.");
                }

                // 10. Payment Method
                const activePaymentOption = document.querySelector('.payment-option.active');
                if (!activePaymentOption) {
                    alert("Please select a payment method.");
                    return false;
                }
                const paymentMethod = activePaymentOption.getAttribute('data-method');
                if (paymentMethod !== "online" && paymentMethod !== "cod") {
                    alert("Invalid payment method selected.");
                    return false;
                }

                // 11. QTY Validation
                const currentQty = parseInt(qty) || 1;
                if (currentQty < 1 || currentQty > 10) {
                    alert("Quantity must be between 1 and 10.");
                    return false;
                }

                return true;
            }

            document.getElementById("cmd-place-order").addEventListener("click", async function (e) {
                e.preventDefault();
                const btn = this;

                // Run robust validation before processing
                if (!validateCheckoutForm()) {
                    return;
                }

                // Step 1: Prevent duplicate submission
                if (btn.dataset.processing === 'true') return;
                btn.dataset.processing = 'true';

                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';

                try {
                    // Step 2: Normalize inputs
                    const mobile = mobileInput.value.replace(/\D/g, '');
                    const normalizedMobile = mobile;
                    const originalEmail = emailInput.value.trim().toLowerCase();

                    const razorpayEmail =
                        originalEmail && originalEmail.trim() !== ''
                            ? originalEmail
                            : normalizedMobile + '@gmail.com';

                    const email = razorpayEmail;

                    const fname = document.getElementById("f-name")?.value.trim() || "";
                    const lname = document.getElementById("l-name")?.value.trim() || "";
                    const door = document.getElementById("door-no")?.value.trim() || "";
                    const street = document.getElementById("street")?.value.trim() || "";
                    const location = document.getElementById("location")?.value.trim() || "";
                    const city = document.getElementById("city")?.value.trim() || "";
                    const state = document.getElementById("state")?.value.trim() || "";
                    const pincode = document.getElementById("pincode")?.value.trim() || "";

                    const activePaymentOption = document.querySelector('.payment-option.active');
                    const paymentMethod = activePaymentOption ? activePaymentOption.getAttribute('data-method') : 'cod';
                    const paymentSelected = paymentMethod === "online" ? "OnlinePayment" : "COD";

                    const price = parseFloat(landingProduct.price) || 0;
                    const shipping = calculateShipping(state);
                    const subtotal = price * qty;
                    const total = subtotal + shipping;

                    // Step 3: Check existing customer
                    let customerId = fetchedCustomerId;

                    if (!customerId) {
                        const list = await fetchJson(`${API_URL}?gofor=customerslist`);
                        const existing = (Array.isArray(list) ? list : []).find(c => (c.mobilenumber || '').trim() === mobile);
                        if (existing) {
                            customerId = getCustomerId(existing);
                        }
                    }

                    // Step 4: Create customer if not exists
                    if (!customerId) {
                        const last4 = mobile.slice(-4);
                        const password = `almaa${last4}`;

                        const cust = await fetchJson(`${API_URL}?gofor=landingcustomersadd`, {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({
                                first_name: fname,
                                last_name: lname,
                                email: email,
                                mobilenumber: mobile,
                                password: password
                            })
                        });

                        customerId = getCustomerId(cust);
                        if (customerId) {
                            localStorage.setItem('guest_password', password);
                        }
                    }

                    // Step 5: Fallback lookup
                    if (!customerId) {
                        const list = await fetchJson(`${API_URL}?gofor=customerslist`);
                        const fallback = (Array.isArray(list) ? list : []).find(c => c.email === email || (c.mobilenumber || '').trim() === mobile);
                        if (fallback) {
                            customerId = getCustomerId(fallback);
                        }
                    }

                    if (!customerId) {
                        throw new Error("Customer creation failed. Please check your details and try again.");
                    }

                    if (customerId && razorpayEmail) {
                        try {
                            await fetchJson(`${API_URL}?gofor=updatecontact`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    customer_id: customerId,
                                    email: razorpayEmail,
                                    mobilenumber: normalizedMobile
                                })
                            });

                            console.log('Customer contact details updated successfully');
                        } catch (err) {
                            console.error('Customer contact update failed:', err);
                        }
                    }

                    // Step 6: Address handling
                    let addressId = selectedAddressId;

                    if (!addressId) {
                        const addr = await fetchJson(`${API_URL}?gofor=landingaddaddress`, {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({
                                doorno: door,
                                street,
                                location,
                                city,
                                state,
                                pincode,
                                customer_id: customerId
                            })
                        });

                        addressId = getAddressId(addr);
                        if (!addressId) throw new Error("Address creation failed.");
                    }

                    // Step 7: Order creation
                    const finalEmail = razorpayEmail;

                    const orderPayload = {
                        customer_id: customerId,
                        address_id: addressId,
                        product_details: [{
                            product_id: landingProduct.id || "",
                            product_name: landingProduct.name || "",
                            prod_attri_id: landingProduct.unit || "",
                            amount: price,
                            quantity: qty
                        }],
                        fullquantity: qty,
                        invoice_amount: subtotal,
                        delivery_charge: shipping,
                        discount_amount: 0,
                        total_amount: total,
                        payment_mode: paymentSelected,
                        email: finalEmail,
                        mobilenumber: normalizedMobile
                    };

                    const order = await fetchJson(`${API_URL}?gofor=landingcreateorders`, {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify(orderPayload)
                    });

                    const orderId = getOrderId(order);
                    if (!orderId) throw new Error("Order creation failed.");

                    // Payment handling
                    if (paymentSelected === "COD") {
                        const isNewCustomer = localStorage.getItem('guest_password') ? 1 : 0;

                        // Store invoice details in sessionStorage for seamless invoice generation
                        const invoiceData = {
                            name: fname + " " + lname,
                            email: email,
                            phone: mobile,
                            address: `${door}, ${street}, ${city}, ${state} - ${pincode}`,
                            product: landingProduct.name || "Natural Piles Care Combo",
                            qty: qty,
                            price: price,
                            shipping: shipping,
                            payment: paymentSelected
                        };
                        sessionStorage.setItem('last_order_invoice', JSON.stringify(invoiceData));

                        localStorage.clear();
                        fetch("session.php", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ order_id: orderId })
                        })
                            .then(res => res.json())
                            .then(data => {
                                window.location.href = "thankyou?new=" + isNewCustomer;
                            })
                            .catch(() => {
                                window.location.href = "thankyou?new=" + isNewCustomer;
                            });
                        return;
                    }

                    // Online Payment
                    const razorData = await fetchJson(`${API_URL}?gofor=razorpay_test_handler`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            customer_id: customerId,
                            order_id: orderId,
                            email: razorpayEmail,
                            mobilenumber: normalizedMobile
                        })
                    });

                    if (!razorData?.order_id || !razorData?.razorpay_key) {
                        throw new Error("Razorpay initialisation failed.");
                    }

                    const options = {
                        key: razorData.razorpay_key,
                        amount: Math.round(total * 100),
                        currency: "INR",
                        name: "ALMAA HERBAL",
                        image: "https://almaherbal.com/product/ulcer-combo/lp-1/assets/img/logo.png",
                        description: `Order #${orderId}`,
                        order_id: razorData.order_id,
                        prefill: {
                            name: fname + " " + lname,
                            email: email,
                            contact: mobile
                        },
                        handler: async function (response) {
                            try {
                                await fetchJson(`${API_URL}?gofor=razorpay_test_handler`, {
                                    method: 'POST',
                                    headers: { 'Content-Type': 'application/json' },
                                    body: JSON.stringify({
                                        customer_id: customerId,
                                        order_id: orderId,
                                        email: razorpayEmail,
                                        mobilenumber: normalizedMobile,
                                        razorpay_payment_id: response.razorpay_payment_id,
                                        razorpay_order_id: response.razorpay_order_id,
                                        razorpay_signature: response.razorpay_signature
                                    })
                                });

                                const confirmUrl = `${API_URL}?gofor=confirmorder&order_id=${orderId}&razorpay_payment_id=${encodeURIComponent(response.razorpay_payment_id)}`;
                                await fetchJson(confirmUrl);
                            } catch (err) {
                                console.error("Razorpay confirmation error:", err);
                            }
                            const isNewCustomer = localStorage.getItem('guest_password') ? 1 : 0;

                            // Store invoice details in sessionStorage for seamless invoice generation
                            const invoiceData = {
                                name: fname + " " + lname,
                                email: email,
                                phone: mobile,
                                address: `${door}, ${street}, ${city}, ${state} - ${pincode}`,
                                product: landingProduct.name || "Natural Piles Care Combo",
                                qty: qty,
                                price: price,
                                shipping: shipping,
                                payment: paymentSelected
                            };
                            sessionStorage.setItem('last_order_invoice', JSON.stringify(invoiceData));

                            localStorage.clear();
                            fetch("session.php", {
                                method: "POST",
                                headers: { "Content-Type": "application/json" },
                                body: JSON.stringify({ order_id: orderId })
                            })
                                .then(res => res.json())
                                .then(data => {
                                    window.location.href = "thankyou?new=" + isNewCustomer;
                                })
                                .catch(() => {
                                    window.location.href = "thankyou?new=" + isNewCustomer;
                                });
                        }
                    };

                    const rzp = new Razorpay(options);
                    rzp.open();

                    setTimeout(() => resetBtn(btn), 2000);

                } catch (err) {
                    console.error("Place Order error:", err);
                    alert(err.message || "An error occurred while placing your order.");
                    resetBtn(btn);
                }
            });


            // Helper: reset button state
            function resetBtn(btn) {
                btn.dataset.processing = 'false';
                btn.disabled = false;
                btn.innerHTML = `Place Order
                <i class="fas fa-check" style="margin-left: 10px;"></i>`;
            }

            // Custom error class for user-facing validation messages
            class UserError extends Error {
                constructor(msg) {
                    super(msg);
                    this.name = "UserError";
                }
            }

        }); // DOMContentLoaded
    </script>
</body>

</html>