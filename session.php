<?php
/**
 * Session API endpoint
 * Stores the order ID in the session context on checkout success.
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['order_id'])) {
    $_SESSION['order_id'] = $data['order_id'];
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'order_id missing']);
}
