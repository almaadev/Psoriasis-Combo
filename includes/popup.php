<?php
/**
 * Reusable Popup/Modal Component
 * Automatically displays notifications set in PHP sessions, and provides
 * a universal JavaScript interface to trigger beautiful popups dynamically.
 */
$showSessionPopup = false;
$sessionPopupTitle = '';
$sessionPopupMessage = '';
$sessionPopupType = 'info';

if (isset($_SESSION['popup_title']) || isset($_SESSION['popup_message'])) {
    $showSessionPopup = true;
    $sessionPopupTitle = $_SESSION['popup_title'] ?? 'Notification';
    $sessionPopupMessage = $_SESSION['popup_message'] ?? '';
    $sessionPopupType = $_SESSION['popup_type'] ?? 'info';
    
    // Clear session storage to avoid double-rendering on subsequent requests
    unset($_SESSION['popup_title']);
    unset($_SESSION['popup_message']);
    unset($_SESSION['popup_type']);
}
?>

<!-- Reusable Modal Markup -->
<div id="centralModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/60 backdrop-blur-sm transition-all duration-300" aria-hidden="true" role="dialog">
  <div id="centralModalBox" class="relative w-full max-w-md scale-95 opacity-0 transform rounded-3xl bg-white p-8 shadow-2xl transition-all duration-300 mx-4">
    <!-- Header -->
    <div class="flex items-center justify-between pb-4 border-b">
      <h3 id="modalTitle" class="text-xl font-bold text-gray-800">Notification</h3>
      <button type="button" onclick="closeCentralModal()" class="text-gray-400 hover:text-gray-600 text-3xl font-semibold leading-none">&times;</button>
    </div>
    
    <!-- Body -->
    <div class="py-6">
      <div id="modalIconContainer" class="hidden w-16 h-16 mx-auto rounded-full flex items-center justify-center text-3xl mb-4 font-bold">
        <!-- SVG icon / Symbol inserted here -->
      </div>
      <p id="modalMessage" class="text-gray-600 text-center text-base leading-relaxed"></p>
    </div>
    
    <!-- Footer -->
    <div class="flex justify-center pt-4 border-t">
      <button type="button" onclick="closeCentralModal()" class="px-6 py-2.5 rounded-full text-white bg-greentext font-semibold shadow hover:scale-105 transition">
        Dismiss
      </button>
    </div>
  </div>
</div>

<script>
/**
 * Global JavaScript helper to invoke the beautiful central modal
 * @param {string} title - The title of the modal
 * @param {string} message - The message body to display
 * @param {string} type - 'success', 'error', 'warning', or 'info'
 */
function showCentralModal(title, message, type = 'info') {
    const modal = document.getElementById('centralModal');
    const modalBox = document.getElementById('centralModalBox');
    const titleEl = document.getElementById('modalTitle');
    const msgEl = document.getElementById('modalMessage');
    const iconContainer = document.getElementById('modalIconContainer');
    
    if (!modal || !titleEl || !msgEl || !iconContainer) return;
    
    titleEl.textContent = title;
    msgEl.textContent = message;
    
    // Clean and reset style mappings
    iconContainer.className = "w-16 h-16 mx-auto rounded-full flex items-center justify-center text-3xl mb-4 font-bold";
    iconContainer.classList.remove('hidden');
    
    if (type === 'success') {
        iconContainer.innerHTML = '✔';
        iconContainer.classList.add('bg-green-100', 'text-green-600');
    } else if (type === 'error') {
        iconContainer.innerHTML = '✖';
        iconContainer.classList.add('bg-red-100', 'text-red-600');
    } else if (type === 'warning') {
        iconContainer.innerHTML = '⚠';
        iconContainer.classList.add('bg-yellow-100', 'text-yellow-600');
    } else {
        iconContainer.innerHTML = 'ℹ';
        iconContainer.classList.add('bg-blue-100', 'text-blue-600');
    }
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    setTimeout(() => {
        modalBox.classList.remove('scale-95', 'opacity-0');
        modalBox.classList.add('scale-100', 'opacity-100');
    }, 15);
}

/**
 * Global helper to shut the central modal
 */
function closeCentralModal() {
    const modal = document.getElementById('centralModal');
    const modalBox = document.getElementById('centralModalBox');
    if (!modal || !modalBox) return;
    
    modalBox.classList.remove('scale-100', 'opacity-100');
    modalBox.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }, 180);
}

document.addEventListener('DOMContentLoaded', () => {
    // If a server-side session message has been injected, show it
    <?php if ($showSessionPopup): ?>
        showCentralModal(
            <?= json_encode($sessionPopupTitle) ?>, 
            <?= json_encode($sessionPopupMessage) ?>, 
            <?= json_encode($sessionPopupType) ?>
        );
    <?php endif; ?>
});
</script>
