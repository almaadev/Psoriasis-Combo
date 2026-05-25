<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Serve index.html with .html → .php link rewriting
$html = file_get_contents(__DIR__ . '/index.html');

$html = str_replace(
    ['./checkout.php', 'checkout.php', './thankyou.html', 'thankyou.html', './invoice.html', 'invoice.html'],
    ['./checkout.php', 'checkout.php', './thankyou.php', 'thankyou.php', './invoice.php', 'invoice.php'],
    $html
);

echo $html;
