<?php
/**
 * Scripts Component
 * Centralizes the loading of standard JavaScript tags and accommodates
 * dynamic page-level script array allocations ($pageScripts).
 */
?>
<!-- Base Universal JavaScript -->
<script src="<?= ASSET_URL ?>js/script.js"></script>

<!-- Page-Specific Dynamic Script Queue Injection -->
<?php if (isset($pageScripts) && is_array($pageScripts)): ?>
  <?php foreach ($pageScripts as $scriptPath): ?>
    <script src="<?= htmlspecialchars($scriptPath) ?>"></script>
  <?php endforeach; ?>
<?php endif; ?>
