<?php
/**
 * Hero Component
 * Renders the sliding banner hero section of the landing page.
 */
?>
<!-- ================= HERO ================= -->
<!-- HERO SLIDER -->
<section id="home" class="h-[90vh] relative overflow-hidden group">
    <!-- SLIDES -->
    <div id="heroSlider" class="flex h-full transition-transform duration-700 ease-in-out">
      <!-- SLIDE 1 -->
      <a href="./checkout.php" class="relative block min-w-full overflow-hidden">
        <!-- Image -->
        <picture>
          <source media="(max-width:768px)" srcset="assets/banner-image/mobile-banner1.jpeg" class="max-w-full h-auto object-cover">
          <img src="assets/banner-image/Psoriasis combo Siled.jpeg" alt="banner" class="min-w-full h-full object-cover object-center">
        </picture>
        <!-- Overlay -->
        <div class="absolute inset-0 flex items-end justify-center pb-20 md:items-center md:justify-start md:pb-0 md:py-0">
          <div class="max-w-xl px-6 md:px-10 lg:ml-20 xl:ml-32 text-center md:text-left space-y-4 md:space-y-6 lg:space-y-8">
            <!-- Heading -->
            <!-- <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-semibold text-greentext leading-tight">
              Struggling with Dry, Scaly & Itchy Skin?
            </h2> -->
            <!-- Description -->
            <!-- <p class="text-sm sm:text-base md:text-lg lg:text-xl text-white/90">
              Traditional herbal combo to healthier skin appearance
            </p> -->
            <!-- Button -->
            <!-- <div class="flex justify-center md:justify-start">
              <button class="border-2 border-greentext px-4 py-2 md:px-6 md:py-3 rounded-full font-semibold text-greentext transition hover:scale-105">
                Order Now
                <span class="ml-2 transition-transform group-hover:translate-x-1">→</span>
              </button>
            </div> -->
          </div>
        </div>
      </a>
      <!-- SLIDE 2 -->
      <a href="./checkout.php" class="block min-w-full relative">
        <picture>
          <source media="(max-width:768px)" srcset="assets/banner-image/mobile-banner2.jpeg" class="max-w-full h-auto object-cover">
          <img src="assets/banner-image/Psoriasis-banner-edited.jpg" alt="banner-img2" class="min-w-full bg-cover h-full">
        </picture>
        <div class="absolute inset-0 w-[100%] h-[100%] flex justify-center items-center bg-black/10">
          <div class="space-y-5">
            <!-- <h2 class="text-5xl font-bold text-center text-white">Herbal Support for Psoriasis ! ! !</h2> -->
            <!-- <p class="text-xl text-center text-gray-300">Powered by traditional herbs like Sivanar Vembu, Vetpalai, & Nellikai</p> -->
          </div>
        </div>
      </a>
      <!-- SLIDE 3 -->
      <a href="./checkout.php" class="block min-w-full relative"> 
        <picture>
          <source media="(max-width:768px)" srcset="assets/banner-image/mobile-banner3.jpeg" class="max-w-full h-auto object-cover">
          <img src="assets/banner-image/product-banner.jpg" alt="banner-img3" class="min-w-full bg-cover h-full">
        </picture>
        <div class="absolute inset-0 w-[100%] h-[100%] flex justify-start items-center bg-black/10">
          <div class="space-y-5">
            <!-- <h2 class="text-5xl font-bold text-center text-white">Almaa Psoriasis Combo</h2> -->
            <!-- <p class="text-xl text-center text-gray-300">When Skin Irritation Keeps Coming Back…</p> -->
          </div>
        </div>
      </a>
    </div>
    <button id="prev-btn" class="hidden md:flex absolute top-[50%] left-[5%] text-3xl px-3 py-1 text-white/0 group-hover:text-white/90 rounded-full font-bold z-50 hoverEffect">
      &#10094;
    </button>
    <button id="next-btn" class="hidden md:flex absolute top-[50%] right-[5%] text-3xl px-3 py-1 text-white/0 group-hover:text-white/90 rounded-full font-bold z-50 hoverEffect">
      &#10095;
    </button>
    <!-- DOTS -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-2">
      <span class="hero-dot active"></span>
      <span class="hero-dot"></span>
      <span class="hero-dot"></span>
    </div>
</section>
