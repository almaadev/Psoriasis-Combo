<?php
/**
 * Order Confirmation Screen
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

$order_id = $_SESSION['order_id'] ?? null;

if (!$order_id) {
  header("Location: checkout.php");
  exit;
}

/* ==============================
   FETCH ORDER DETAILS USING CURL
============================== */

$fullUrl = API_URL . "?gofor=getorder&order_id=" . urlencode($order_id);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $fullUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // avoid SSL issue (if any)
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$response = curl_exec($ch);

if (curl_errno($ch)) {
  echo "Curl Error: " . curl_error($ch);
  curl_close($ch);
  exit;
}

curl_close($ch);

if (!$response) {
  echo "Empty response from API";
  exit;
}

$orderDetails = json_decode($response, true);

if (!$orderDetails) {
  echo "Invalid JSON from API";
  exit;
}

/* ==============================
   CHECK RESPONSE STRUCTURE
============================== */

if (isset($orderDetails['Order List'])) {
  $order = $orderDetails['Order List'];
  $orderDetail = $orderDetails['Order Detail'];
  $productDetails = $orderDetails['Product Detail'];
  $customerDetails = $orderDetails['Customer Detail'];
  $addressDetails = $orderDetails['Address Detail'];
} else {
  echo "Failed to fetch order details.";
  exit;
}

$isNewCustomer = isset($_GET['new']) && $_GET['new'] == '1';

// Build Invoice URL parameters dynamically from fetched database data
$invoiceParams = [];
if (isset($customerDetails)) {
  $cust = isset($customerDetails[0]) ? $customerDetails[0] : $customerDetails;
  $fullName = trim(($cust['first_name'] ?? '') . ' ' . ($cust['last_name'] ?? ''));
  if (!$fullName) {
    $fullName = trim(($cust['fname'] ?? '') . ' ' . ($cust['lname'] ?? ''));
  }
  $invoiceParams['name'] = $fullName;
  $invoiceParams['email'] = $cust['email'] ?? '';
  $invoiceParams['phone'] = $cust['mobilenumber'] ?? $cust['phone'] ?? '';
}
if (isset($addressDetails)) {
  $addr = isset($addressDetails[0]) ? $addressDetails[0] : $addressDetails;
  $invoiceParams['address'] = trim(
    ($addr['doorno'] ?? '') . ', ' .
    ($addr['street'] ?? '') . ', ' .
    ($addr['city'] ?? '') . ', ' .
    ($addr['state'] ?? '') . ' - ' .
    ($addr['pincode'] ?? '')
  );
}
if (isset($productDetails) && is_array($productDetails) && isset($productDetails[0])) {
  $prodName = $productDetails[0]['product_name'] ?? 'Psoriasis Care Combo';
  if (stripos($prodName, 'Ulcer') !== false) {
    $prodName = 'Psoriasis Care Combo';
  }
  $invoiceParams['product'] = $prodName;

  $sessionQty = $_SESSION['qty'] ?? 1;
  $apiQty = $productDetails[0]['quantity'] ?? 1;
  // If API quantity is unreasonably large (like 100), use session quantity
  $invoiceParams['qty'] = ($apiQty > 10) ? $sessionQty : $apiQty;

  $invoiceParams['price'] = $productDetails[0]['amount'] ?? '';
}
if (isset($orderDetail)) {
  $invoiceParams['shipping'] = $orderDetail['delivery_charge'] ?? 50;
  $invoiceParams['payment'] = $orderDetail['payment_mode'] ?? 'COD';
}
$invoiceParams['order_id'] = $order['order_id'] ?? $order_id ?? '';

$invoiceUrl = "./invoice.php?" . http_build_query($invoiceParams);

// Set up page scripts
$pageScripts = [
  ASSET_URL . 'js/thankyou.js'
];

$metaTitle = "Order Confirmed | Almaa Herbal";
$metaDescription = "Your order has been placed successfully. Thank you for choosing Almaa Herbal Nature.";

require_once __DIR__ . '/includes/head.php';
?>

<body class="bg-greentext/10 overflow-y-auto relative py-10 min-h-screen flex items-center justify-center">

  <!-- Falling Leaves Animation Container -->
  <div id="leafContainer"></div>

  <!-- Reusable Header (Optional - original doesn't show full header but let's keep it focus-centered) -->
  <div class="relative z-10 flex items-center justify-center w-full px-6">
    <div class="bg-white rounded-3xl shadow-2xl p-10 text-center max-w-lg w-full pop my-8">

      <!-- Success Graphic Icon -->
      <div class="w-20 h-20 mx-auto bg-green-100 rounded-full flex items-center justify-center text-4xl text-green-600">
        ✔
      </div>

      <h1 class="text-3xl font-bold text-gray-800 mt-6">
        Thank You for Your Order!
      </h1>

      <?php if (isset($order['order_id'])): ?>
        <p class="text-base font-bold mt-2" style="color: #2a6f44;">
          Order ID: #<?php echo htmlspecialchars($order['order_id']); ?>
        </p>
      <?php endif; ?>

      <p class="text-muted small mt-3" style="color: #6c757d; font-size: 0.875rem;">We've received your order and will
        begin processing it right away. You will receive a confirmation shortly.</p>

      <div class="mt-4 p-4 rounded-2xl text-left" style="background-color: #f0fdf4; border: 1px solid #dcfce7;">
        <p class="mb-2" style="font-weight: 600; color: #166534;">Track Your Order History</p>
        <p class="text-muted small mb-0" style="color: #6c757d; font-size: 0.875rem; line-height: 1.6;">
          To view your order history, please login to <a href="https://almaaherbal.com/" target="_blank"
            style="color: #2a6f44; font-weight: 600; text-decoration: underline;">almaaherbal.com</a><br><br>
          <?php if ($isNewCustomer): ?>
            <strong>Username:</strong> Your mobile number<br>
            <strong>Password:</strong> almaa + last 4 digits of your mobile number<br>
          <?php else: ?>
            Already an existing customer? Login with the email and password you entered at the time of signup. <br><br>
            If you didn't signup earlier, use your mobile number and default password: <strong>almaa + last 4 digits of
              your mobile number</strong>.
          <?php endif; ?>

          <?php
          $emailAddress = $customerDetails['email'] ?? '';
          $mobileNumber = $customerDetails['mobilenumber'] ?? $customerDetails['phone'] ?? '';
          if ($emailAddress && $mobileNumber && $emailAddress === ($mobileNumber . '@gmail.com')):
          ?>
            <br><br>
            <strong>Note:</strong> Since you did not provide an email, your registered email is set as <strong><?php echo htmlspecialchars($emailAddress); ?></strong>. You can update this to your personal email if you wish.
          <?php endif; ?>

          <span class="mt-3 d-block" style="font-style: italic;">Happy Shopping!</span>
        </p>
      </div>

      <!-- Action Buttons -->
      <div class="mt-8 grid md:grid-cols-2 gap-5 p-2">
        <a href="<?php echo htmlspecialchars($invoiceUrl); ?>"
          class="bg-greentext text-white py-3 px-5 rounded-xl font-semibold hover:scale-105 transition block">
          Download Invoice
        </a>
        <a href="index.php"
          class="border border-greentext text-greentext py-3 px-5 rounded-xl font-semibold hover:bg-greentext hover:text-white transition block">
          Continue Shopping
        </a>
      </div>

    </div>
  </div>

  <?php require_once __DIR__ . '/includes/popup.php'; ?>
  <?php require_once __DIR__ . '/includes/scripts.php'; ?>
</body>

</html>