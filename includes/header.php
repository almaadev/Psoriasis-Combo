<?php
/**
 * Header Component
 * Renders the top navigation bar with logo, desktop links, WhatsApp chat integration,
 * and a mobile menu slider.
 */
?>
<!-- ================= HEADER ================= -->
<header id="navbar" class="sticky top-0 inset-x-0 z-40 transition-all duration-300 bg-bgone relative shadow-xl">
    <nav id="navInner" class="max-w-7xl mx-auto px-2 py-3 flex items-center justify-between transition-all duration-300">
      <!-- Logo -->
      <a href="#home">
        <img class="w-[80px] lg:w-[100px]" src="assets/Almaa Herbal Logo_Without TM.png" alt="Almaa Herbal">
      </a>
      <!-- Desktop Menu -->
      <ul class="hidden md:flex items-center md:gap-4 lg:gap-10 font-medium text-green-900">
        <li><a href="#product" class="lg:text-base nav-link hoverEffect">Product</a></li>
        <li><a href="#about" class="lg:text-base nav-link hoverEffect">About</a></li>
        <li><a href="#ingredients" class="lg:text-base nav-link hoverEffect">Ingredients</a></li>
        <li><a href="#benefits" class="lg:text-base nav-link hoverEffect">Benefits</a></li>
        <li><a href="#how-to-use" class="lg:text-base nav-link hoverEffect">How To Use</a></li>
        <li><a href="#faq" class="lg:text-base nav-link hoverEffect">FAQ</a></li>
        <li><a href="#testimonial" class="lg:text-base nav-link hoverEffect">Testimonials</a></li>
        <li>
          <a href="https://api.whatsapp.com/send/?phone=%2B917401403037&text&type=phone_number&app_absent=0" target="_blank" 
            class="md:text-sm lg:text-base flex gap-1 items-center text-greentext hover:scale-105 hoverEffect">Chat with Us 
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="currentColor">
              <path d="M16 2.933A13.067 13.067 0 0 0 4.133 21.6L2 30l8.533-2.067A13.067 13.067 0 1 0 16 2.933zm0 23.867a10.74 10.74 0 0 1-5.467-1.5l-.4-.233-5.067 1.233 1.333-4.933-.267-.433A10.733 10.733 0 1 1 16 26.8zm5.867-8.033c-.333-.167-1.967-.967-2.267-1.067-.3-.1-.533-.167-.767.167-.233.333-.9 1.067-1.1 1.3-.2.233-.4.267-.733.1-.333-.167-1.4-.517-2.667-1.65-.983-.867-1.65-1.933-1.833-2.267-.183-.333-.017-.517.15-.683.15-.15.333-.4.5-.6.167-.2.233-.333.35-.567.117-.233.058-.433-.029-.6-.087-.167-.767-1.85-1.05-2.533-.275-.667-.55-.583-.767-.6-.2-.017-.433-.017-.667-.017s-.6.083-.917.433c-.317.35-1.2 1.167-1.2 2.85s1.233 3.3 1.4 3.533c.167.233 2.417 3.683 5.85 5.167.817.35 1.45.567 1.95.733.817.267 1.567.233 2.15.142.658-.1 1.967-.8 2.25-1.567.283-.767.283-1.425.2-1.567-.083-.142-.3-.233-.633-.4z"/>
            </svg>
          </a>
        </li>
      </ul>

      <!-- Mobile Menu Button -->
      <button id="menuBtn" class="md:hidden text-black">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="md:hidden absolute top-full left-0 w-full overflow-hidden max-h-0 opacity-0 scale-95 transition-all duration-500 bg-white px-6 shadow-lg">
      <a class="hoverEffect block py-2 text-center mobile-link rounded" href="#home">Home</a>
      <a class="hoverEffect block py-2 text-center mobile-link rounded" href="#product">Product</a>
      <a class="hoverEffect block py-2 text-center mobile-link rounded" href="#about">About</a>
      <a class="hoverEffect block py-2 text-center mobile-link rounded" href="#ingredients">Ingredients</a>
      <a class="hoverEffect block py-2 text-center mobile-link rounded" href="#benefits">Benefits</a>
      <a class="hoverEffect block py-2 text-center mobile-link rounded" href="#how-to-use">How To Use</a>
      <a class="hoverEffect block py-2 text-center mobile-link rounded" href="#faq">FAQ</a>
      <a class="hoverEffect block py-2 text-center mobile-link rounded" href="#testimonial">Testimonials</a>
      <a href="https://api.whatsapp.com/send/?phone=%2B917401403037&text&type=phone_number&app_absent=0" target="_blank" 
        class="rounded-full font-medium py-2 flex gap-1 items-center justify-center text-greentext hover:scale-105 hoverEffect">Chat with Us 
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="currentColor">
          <path d="M16 2.933A13.067 13.067 0 0 0 4.133 21.6L2 30l8.533-2.067A13.067 13.067 0 1 0 16 2.933zm0 23.867a10.74 10.74 0 0 1-5.467-1.5l-.4-.233-5.067 1.233 1.333-4.933-.267-.433A10.733 10.733 0 1 1 16 26.8zm5.867-8.033c-.333-.167-1.967-.967-2.267-1.067-.3-.1-.533-.167-.767.167-.233.333-.9 1.067-1.1 1.3-.2.233-.4.267-.733.1-.333-.167-1.4-.517-2.667-1.65-.983-.867-1.65-1.933-1.833-2.267-.183-.333-.017-.517.15-.683.15-.15.333-.4.5-.6.167-.2.233-.333.35-.567.117-.233.058-.433-.029-.6-.087-.167-.767-1.85-1.05-2.533-.275-.667-.55-.583-.767-.6-.2-.017-.433-.017-.667-.017s-.6.083-.917.433c-.317.35-1.2 1.167-1.2 2.85s1.233 3.3 1.4 3.533c.167.233 2.417 3.683 5.85 5.167.817.35 1.45.567 1.95.733.817.267 1.567.233 2.15.142.658-.1 1.967-.8 2.25-1.567.283-.767.283-1.425.2-1.567-.083-.142-.3-.233-.633-.4z"/>
        </svg>
      </a>
    </div>
</header>
