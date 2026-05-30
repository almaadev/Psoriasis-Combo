<?php
/**
 * Order Form Component
 * Renders the product gallery, lightbox zoom, pricing, pack options, and buy now triggers.
 */
?>
<!-- ================= PRODUCT SECTION ================= -->
<section id="product" class="product-section py-20">
    <div class="product-container max-w-7xl mx-auto px-6">
      <div class="grid grid-cols-1 gap-10 md:grid-cols-2 md:p-5">
        
        <!-- ================= PRODUCT IMAGE SECTION ================= -->
        <div class="product-left md:p-5">
          <div class="main-image-wrapper relative overflow-hidden cursor-zoom-in">
            <div class="image-slider flex transition-transform duration-500" id="sliderTrack">
              <img alt="Almaa Psoriasis Combo" src="assets/Product-image/Psoriasis-Combo.jpeg" class="slide w-full flex-shrink-0 rounded-2xl">
              <img alt="Almaa Psoriasis Combo" src="assets/Product-image/Psoriasis combo Ingrediants.jpg" class="slide w-full flex-shrink-0 rounded-2xl">
              <img alt="Almaa Psoriasis Combo" src="assets/Product-image/Key benefits of the Psoriasis combo.jpg" class="slide w-full flex-shrink-0 rounded-2xl">
              <img alt="Almaa Psoriasis Combo" src="assets/Product-image/Psoriasis combo How to use..jpg" class="slide w-full flex-shrink-0 rounded-2xl">
              <img alt="Almaa Psoriasis Combo" src="assets/Product-image/Psoriasis combo Product info.jpg" class="slide w-full flex-shrink-0 rounded-2xl">
            </div>
          </div>

          <!-- Thumbnails -->
          <div class="thumb-row flex gap-3 mt-10">
            <img alt="Almaa Psoriasis Combo" src="assets/Product-image/Psoriasis-Combo.jpeg" class="thumb" data-index="0">
            <img alt="Almaa Psoriasis Combo" src="assets/Product-image/Psoriasis combo Ingrediants.jpg" class="thumb" data-index="1">
            <img alt="Almaa Psoriasis Combo" src="assets/Product-image/Key benefits of the Psoriasis combo.jpg" class="thumb" data-index="2">
            <img alt="Almaa Psoriasis Combo" src="assets/Product-image/Psoriasis combo How to use..jpg" class="thumb" data-index="3">
            <img alt="Almaa Psoriasis Combo" src="assets/Product-image/Psoriasis combo Product info.jpg" class="thumb" data-index="4">
          </div>
        </div>

        <!-- ================= LIGHTBOX ================= -->
        <div id="lightbox" class="fixed inset-0 bg-black/90 hidden items-center justify-center z-50">
          <!-- Close -->
          <button id="closeLightbox" class="absolute top-4 right-1 md:right-6 text-white text-3xl md:text-5xl rounded-full px-3 pb-2 text-center flex justify-center">&times;</button>
          <!-- Counter -->
          <div id="imageCounter" class="absolute top-6 left-[50%] text-white text-base bg-white/15 px-2 rounded-full">
            1 / 5
          </div>
          <!-- Prev -->
          <button id="prevBtn" class="hidden md:flex absolute left-6 text-white text-4xl bg-white/10 px-4 py-1 rounded-full">&#10094;</button>
          <!-- Image -->
          <div id="lightboxslider" class="md:w-[80%] md:h-[80%] flex justify-center items-center transition duration-300 p-1">
            <img id="lightboxImage" class="max-h-[100%] max-w-[100%] rounded-xl">
          </div>
          <!-- Next -->
          <button id="nextBtn" class="hidden md:flex absolute right-6 text-white text-4xl bg-white/10 px-4 py-1 rounded-full">&#10095;</button>
        </div>
          
        <!-- RIGHT DETAILS -->
        <div class="space-y-5 md:p-5 rounded-3xl">
            <!-- Title -->
            <div>
              <h1 class="text-2xl md:text-4xl font-bold text-gray-800">
               Almaa Psoriasis Combo
              </h1>
              <!-- Rating -->
              <div class="flex items-center gap-3 mt-3">
                <div class="flex text-yellow-400 text-sm md:text-lg">
                  ★ ★ ★ ★ ★
                </div>
                <p class="text-gray-600 text-sm">4.8 (131 Reviews)</p>
                <span class="bg-green-100 text-greentext text-xs font-semibold px-3 py-1 rounded-full">
                  SAVE 25%
                </span>
              </div>

              <p class="text-gray-600 mt-2">
                 Herbal Support for Psoriasis & Chronic Skin Discomfort
Easy to use traditional herbal combination for healthier skin.<br>

Herbal Support for Itching & Scaling  | Traditional Skin Wellness Approach  | Suitable for Long-Term Skin Wellness | Internal + External Siddha Care 

              </p>
            </div>

            <!-- Features -->
            <div class="grid md:grid-cols-2 gap-4">
              <div class="text-sm">✔ Itch Relief Care </div>
              <div class="text-sm">✔ Dryness Control Care</div>
              <div class="text-sm">✔ Flaking Control Care</div>
              <div class="text-sm">✔ Sensitive Skin Support</div>
            </div>

            <!-- Price -->
            <div class="flex items-center gap-4">
              <p class="text-4xl font-bold text-greentext" id="mainPrice">₹2884</p>
              <p class="text-gray-400 line-through text-lg" id="oldPrice">₹3845</p>
              <span class="bg-yellow-400 text-black text-sm font-semibold px-3 py-1 rounded-full">
                25% OFF
              </span>
            </div>

            <!-- Select Pack -->
            <div class="w-[70%]">
              <p class="font-semibold mb-4 text-lg">Select Pack</p>
              <div class="grid grid-cols-2 gap-2">

                <!-- Pack 1 -->
                <button class="pack-btn border border-greentext text-white bg-greentext/80 hover:scale-105 text-center transition" data-pack="1" data-price="2884" data-old="3845">
                  <p class="font-semibold text-lg">Pack of 1</p>
                  <p class="font-bold text-xl">₹2884</p>
                  <p class="text-gray-400 line-through text-sm">₹3845</p>
                </button>

                <!-- Pack 2 -->
                <!--
                <button class="pack-btn border border-greentext hover:scale-105 rounded-2xl text-center transition" data-pack="2" data-price="2884" data-old="7690">
                  <p class="font-semibold text-lg">Pack of 2</p>
                  <p class="font-bold text-xl">₹5768</p>
                  <p class="text-gray-400 line-through text-sm">₹7690</p>
                </button>
                -->

              </div>
            </div>

            <!-- Buy Now -->
            <button id="buyNowBtn"
              class="w-full border border-greentext bg-greentext text-white py-4 rounded-2xl text-xl font-semibold hover:bg-transparent hover:text-greentext hover:scale-105 transition shadow-lg">
              Buy Now
            </button>

            <!-- Free Delivery Marquee -->
            <marquee class="text-greentext p-3 rounded-xl font-medium">
              🚚 Free Delivery on All Prepaid Orders
            </marquee>

            <!-- Doctor Note -->
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-xl">
              <p class="text-sm text-gray-700">
                ⚠️ Note: Please consult a qualified siddha doctor before using any supplements.
                Free consultation: <span class="font-semibold">9363406276</span>
              </p>
            </div>

        </div>
      </div>
    </div>
</section>
