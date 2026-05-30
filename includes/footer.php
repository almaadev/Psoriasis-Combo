<?php
/**
 * Footer Component
 * Renders the bottom layout of pages with store navigation, quick links, policies, and copyright.
 */
?>
<!-- ================= FOOTER ================= -->
<footer class="bg-greentext text-white">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Main Grid -->
    <div class="grid gap-5 md:gap-10 md:grid-cols-3 lg:grid-cols-5 py-10">
      <!-- Brand -->
      <div class="space-y-5">
        <h2 class="text-2xl font-bold text-white">ALMAA HERBAL</h2>
        <p class="text-white/80 text-base">
          Almaa Herbal - Naturals Piles Care. 100% Herbal Solution for Piles & Constipation.
        </p>
        <!-- Social Icons -->
        <div class="flex gap-5">
          <!-- Instagram -->
          <a href="https://www.instagram.com/accounts/login/?next=%2Falmaaherbalnature%2F&source=omni_redirect" aria-label="Instagram" target="_blank"
            class="p-1 rounded-full bg-white text-greentext hover:scale-110 hover:shadow-md hover:shadow-black hoverEffect">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-6 h-6">
                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke="currentColor" stroke-width="2"/>
                <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2"/>
                <circle cx="17" cy="7" r="1.2" fill="currentColor"/>
            </svg>
          </a>
          <!-- Twitter -->
          <a href="https://x.com/almaaherbal_" target="_blank" class="p-1 rounded-full bg-white text-greentext hover:scale-110 hover:shadow-md hover:shadow-black hoverEffect">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M18.24 2H21l-6.46 7.39L22 22h-6.78l-5.3-6.88L3.9 22H1.14l6.92-7.9L2 2h6.9l4.8 6.24L18.24 2zm-1.19 18h1.88L7.02 4h-2L17.05 20z"/>
            </svg>
          </a>
          <!-- Facebook -->
          <a href="https://www.facebook.com/almaherbal" aria-label="Facebook" target="_blank" 
            class="p-1 rounded-full bg-white text-greentext hover:scale-110 hover:shadow-md hover:shadow-black hoverEffect">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7 c0-1.1.9-2 2-2h3z"/>
            </svg>
          </a>
          <!-- Youtube -->
          <a href="https://www.youtube.com/@almaaherbalnature" target="_blank" 
            class="p-1 rounded-full bg-white text-greentext hover:scale-110 hover:shadow-md hover:shadow-black hoverEffect">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
              <path d="M23.5 6.2s-.2-1.7-.9-2.4c-.8-.9-1.7-.9-2.1-1C17.6 2.5 12 2.5 12 2.5h0s-5.6 0-8.5.3c-.4.1-1.3.1-2.1 1 -.7.7-.9 2.4-.9 2.4S0 8.1 0 10v2c0 1.9.5 3.8.5 3.8s.2 1.7.9 2.4c.8.9 1.9.9 2.4 1 1.7.2 7.2.3 8.2.3 0 0 5.6 0 8.5-.3.4-.1 1.3-.1 2.1-1 .7-.7.9-2.4.9-2.4S24 13.9 24 12v-2c0-1.9-.5-3.8-.5-3.8zM9.5 14.5v-5l5 2.5-5 2.5z"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div>
        <h4 class="text-xl mb-2 text-white font-semibold">Quick Links</h4>
        <ul class="space-y-1">
          <li><a href="#product" class="footer-link">Product</a></li>
          <li><a href="#about" class="footer-link">About</a></li>
          <li><a href="#ingredients" class="footer-link">Ingredients</a></li>
          <li><a href="#benefits" class="footer-link">Benefits</a></li>
          <li><a href="#how-to-use" class="footer-link">How To Use</a></li>
          <li><a href="#faq" class="footer-link">FAQ</a></li>
        </ul>
      </div>

      <!-- Policies -->
      <div>
        <h4 class="text-xl mb-2 text-white font-semibold">Policies</h4>
        <ul class="space-y-1">
          <li class="flex gap-1 items-center">
            <a href="https://www.almaherbal.com/shipping-policy" target="_blank" class="footer-link">Shipping</a>
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#ffffff">
              <path d="M240-192q-50 0-85-35t-35-85H48v-408q0-29.7 21.15-50.85Q90.3-792 120-792h552v144h120l120 168v168h-72q0 50-35 85t-85 35q-50 0-85-35t-35-85H360q0 50-35 85t-85 35Zm0-72q20.4 0 34.2-13.8Q288-291.6 288-312q0-20.4-13.8-34.2Q260.4-360 240-360q-20.4 0-34.2 13.8Q192-332.4 192-312q0 20.4 13.8 34.2Q219.6-264 240-264ZM120-384h24q17-23 42-35.5t54-12.5q29 0 54 12.5t41.53 35.5H600v-336H120v336Zm600 120q20.4 0 34.2-13.8Q768-291.6 768-312q0-20.4-13.8-34.2Q740.4-360 720-360q-20.4 0-34.2 13.8Q672-332.4 672-312q0 20.4 13.8 34.2Q699.6-264 720-264Zm-48-192 168-1-85-119h-83v120Zm-310-93Z"/>
            </svg>
          </li>
          <li class="flex gap-1 items-center">
            <a href="https://www.almaherbal.com/returns-&-refund-policy" target="_blank" class="footer-link">Return & Refund Policy</a>
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#ffffff">
              <path d="m474-210 102-102-101-102-34 34 42 43q-29 0-56.5-10T378-378q-20-20-31-46.5T336-480q0-16 3-31t9-29l-35-35q-12 22-18.5 45.5T288-480q0 38 14.5 73.5T344-344q29 29 64.5 42.5T484-288l-44 44 34 34Zm173-175q12-22 18.5-45.5T672-480q0-38-15-73.5T615-616q-28-28-65-41.5T474-670l46-46-34-34-102 102 102 102 34-34-44-44q31 0 57.5 10t48.5 32q20 20 31 46.5t11 55.5q0 16-3 31t-9 29l35 35ZM480-96q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/>
            </svg>
          </li>
          <li class="flex gap-1 items-center">
            <a href="https://www.almaherbal.com/terms-&-conditions" target="_blank" class="footer-link">Terms & Conditions</a>
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#ffffff">
              <path d="m474-210 102-102-101-102-34 34 42 43q-29 0-56.5-10T378-378q-20-20-31-46.5T336-480q0-16 3-31t9-29l-35-35q-12 22-18.5 45.5T288-480q0 38 14.5 73.5T344-344q29 29 64.5 42.5T484-288l-44 44 34 34Zm173-175q12-22 18.5-45.5T672-480q0-38-15-73.5T615-616q-28-28-65-41.5T474-670l46-46-34-34-102 102 102 102 34-34-44-44q31 0 57.5 10t48.5 32q20 20 31 46.5t11 55.5q0 16-3 31t-9 29l35 35ZM480-96q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/>
            </svg>
          </li>
          <li class="flex gap-1 items-center">
            <a href="https://www.almaherbal.com/privacy-policy" target="_blank" class="footer-link">Privacy Policy</a>
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#ffffff">
              <path d="M480-96q-136-38-212-160t-76-259v-229l288-120 288 120v229q0 72-22 147t-71 134L553.14-356Q536-345 518-340.5t-38 4.5q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 20-5 38.11T604-407l55 55q17-39 27-80t10-83v-181l-216-90-216 90v181q0 105 56.5 203.5T480-171q28-9 51.5-25t44.5-36l51 52q-32 29-68.5 51T480-96Zm.21-312Q510-408 531-429.21t21-51Q552-510 530.79-531t-51-21Q450-552 429-530.79t-21 51Q408-450 429.21-429t51 21Zm-.21-72Z"/>
            </svg>
          </li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div>
        <h4 class="text-xl mb-2 text-white font-semibold">Contact Us</h4>
        <ul class="space-y-2">
          <li>
            <a href="mailto:almaahospital@gmail.com" class="inline-block footer-link">almaahospital@gmail.com</a>
          </li>
          <li>
            <a href="tel:+917401403000" class="inline-block footer-link">+91 7401 403000</a>
          </li>
          <li class="flex gap-1 items-center">
            <a href="https://api.whatsapp.com/send/?phone=%2B917401403037&text&type=phone_number&app_absent=0" class="inline-block footer-link" target="_blank">
              +91 74014 03037
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff" class="w-4 h-4">
              <path d="M20.52 3.48A11.82 11.82 0 0012.05 0C5.43 0 .05 5.38.05 12c0 2.11.55 4.17 1.6 5.99L0 24l6.17-1.62A11.9 11.9 0 0012.05 24C18.67 24 24.05 18.62 24.05 12c0-3.17-1.23-6.16-3.53-8.52zM12.05 21.82a9.77 9.77 0 01-4.97-1.36l-.35-.21-3.66.96.98-3.57-.23-.37a9.76 9.76 0 01-1.49-5.27c0-5.41 4.41-9.82 9.82-9.82 2.62 0 5.08 1.02 6.93 2.88a9.72 9.72 0 012.89 6.94c0 5.41-4.41 9.82-9.82 9.82zm5.39-7.35c-.3-.15-1.76-.87-2.03-.97-.27-.1-.46-.15-.66.15-.19.3-.76.97-.93 1.17-.17.2-.34.22-.64.07-.3-.15-1.25-.46-2.38-1.47-.88-.79-1.47-1.77-1.64-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.34.45-.51.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.66-1.6-.91-2.2-.24-.58-.49-.5-.66-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.05 1.02-1.05 2.49s1.08 2.89 1.23 3.09c.15.2 2.12 3.23 5.14 4.53.72.31 1.28.49 1.71.63.72.23 1.38.2 1.9.12.58-.09 1.76-.72 2.01-1.42.25-.7.25-1.3.17-1.42-.08-.12-.27-.2-.57-.35z"/>
            </svg>
          </li>
        </ul>
      </div>

      <!-- User Account -->
      <div>
        <h4 class="text-xl mb-2 text-white font-semibold">My Account</h4>
        <ul class="space-y-1">
          <li><a href="https://www.almaherbal.com/account" target="_blank" class="footer-link">Profile</a></li>
          <li><a href="https://www.almaherbal.com/account-my-order" target="_blank" class="footer-link">Orders</a></li>
          <li><a href="https://www.almaherbal.com/category" target="_blank" class="footer-link">Products</a></li>
          <li><a href="https://www.almaherbal.com/support" target="_blank" class="footer-link">Support</a></li>
        </ul>
      </div>
    </div>
    <!-- Bottom -->
    <div class="py-5 border-t border-green-200 text-center text-base text-gray-300">
      © 2026 Almaa Herbal Nature Pvt Ltd
    </div>
  </div>
</footer>
