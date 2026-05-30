<?php
/**
 * Head Component
 * Renders the HTML <head> section with dynamic SEO metadata, base styles,
 * Google Fonts, and support for page-specific stylesheets.
 */
$metaTitle = isset($metaTitle) ? $metaTitle : 'Psoriatic Combo | Almaa Herbal';
$metaDescription = isset($metaDescription) ? $metaDescription : 'A traditional herbal combination to support skin comfort and healthier skin appearance.';
$metaKeywords = isset($metaKeywords) ? $metaKeywords : 'psoriasis, skin irritation, herbal, natural, skin comfort, almaa';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title><?= htmlspecialchars($metaTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDescription) ?>" />
  <meta name="keywords" content="<?= htmlspecialchars($metaKeywords) ?>" />
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= IMAGE_URL ?>Almaa Herbal Logo_Without TM.png" type="image/x-icon">
  
  <!-- Base Stylesheet -->
  <link rel="stylesheet" href="<?= ASSET_URL ?>css/style.css">
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap" rel="stylesheet">

  <!-- Tailwind Config -->
  <script>
    if (window.tailwind) {
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              greentext: "#176803",
              primary: "#22c55e",
              soft: "#f0fdf4",
              button: "#176803",
              textprimary: "#1f2937",
              bgone: "#f5f5f5",
              bgtwo: "#ffffff"
            }
          }
        }
      };
    }
  </script>

  <!-- Page-Specific Stylesheets Injection -->
  <?php if (isset($pageStyles) && is_array($pageStyles)): ?>
    <?php foreach ($pageStyles as $stylePath): ?>
      <link rel="stylesheet" href="<?= htmlspecialchars($stylePath) ?>">
    <?php endforeach; ?>
  <?php endif; ?>
</head>
