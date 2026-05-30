<?php
/**
 * Testimonials Component
 * Renders the sliding testimonials carousel showing client feedback.
 */
?>
<!-- ================= Testimonial ================= -->
<section id="testimonial" class="py-40 overflow-hidden">
  <div class="max-w-6xl mx-auto px-6">

    <!-- Heading -->
    <div class="text-center mb-20">
      <h2 class="text-4xl md:text-5xl font-bold text-black mb-4">
        What People Say
      </h2>
      <p class="text-gray-500 max-w-xl mx-auto">
        Real experiences from people who use our product daily 🤗
      </p>
    </div>

    <!-- Carousel -->
    <div class="relative flex items-center justify-center">

      <!-- Cards Wrapper -->
      <div class="testimonial-stack">

        <!-- Card 1 -->
        <div class="stack-card active">
          <div class="text-center pb-10">
            <div class="stars">★★★★★</div>
          </div>
          <p>
            “ALMAA PRODUCTS ARE GOOD IN QUALITY. AFFORDABLE PRICE.
             THEY ARE TAKING CARE ABOUT THE PATIENTS. ”
          </p>
          <div class="profile">
            <!-- <img class="image" src="<?= IMAGE_URL ?>placeholder-image-male.jpg" alt="Rajasekaran Sangeetha" /> -->
            <div class="flex gap-1 items-center">
              <h4>Rajasekaran Sangeetha</h4>
              <!-- <img src="<?= IMAGE_URL ?>checklist.png" alt="verified" class="w-5 h-5"> -->
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="stack-card">
          <div class="text-center pb-10">
            <div class="stars">★★★★★</div>
          </div>
          <p>
            “We visited Almaa Siddha Care Hospital for fertility treatment
             and had a positive outcome. The treatment was excellent”
          </p>
          <div class="profile">
            <!-- <img class="image" src="<?= IMAGE_URL ?>placeholder-image-female.jpg" alt="Varshaa Pandiyan" /> -->
            <div class="flex gap-1 items-center">
              <h4>Varshaa Pandiyan</h4>
              <!-- <img src="<?= IMAGE_URL ?>checklist.png" alt="verified" class="w-5 h-5"> -->
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="stack-card">
          <div class="text-center pb-10">
            <div class="stars">★★★★★</div>
          </div>
          <p>
            “We visited Almaa sidha Erode we get treated for diabetic and cholesterol.
             Medicines worked very good and everything came normal. ”
          </p>
          <div class="profile">
            <!-- <img class="image" src="<?= IMAGE_URL ?>placeholder-image-female.jpg" alt="Zulfiya Fargana" /> -->
            <div class="flex gap-1 items-center">
              <h4>Zulfiya Fargana</h4>
              <!-- <img src="<?= IMAGE_URL ?>checklist.png" alt="verified" class="w-5 h-5"> -->
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="stack-card">
          <div class="text-center pb-10">
            <div class="stars">★★★★★</div>
          </div>
          <p>
            “I'm using almaa products and medicines for more than 5 years. Very good results and very effective medicines. ”
          </p>
          <div class="profile">
            <!-- <img class="image" src="<?= IMAGE_URL ?>placeholder-image-female.jpg" alt="Aishwarya Jayasekar" /> -->
            <div class="flex gap-1 items-center">
              <h4>Aishwarya Jayasekar</h4>
              <!-- <img src="<?= IMAGE_URL ?>checklist.png" alt="verified" class="w-5 h-5"> -->
            </div>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="stack-card">
          <div class="text-center pb-10">
            <div class="stars">★★★★★</div>
          </div>
          <p>
            “I am using Almaa Health Products for almost 3 years now and it helped me a lot.
             I had used the products to cure seasonal flus”
          </p>
          <div class="profile">
            <!-- <img class="image" src="<?= IMAGE_URL ?>placeholder-image-female.jpg" alt="janani jayapandian" /> -->
            <div class="flex gap-1 items-center">
              <h4>janani jayapandian</h4>
              <!-- <img src="<?= IMAGE_URL ?>checklist.png" alt="verified" class="w-5 h-5"> -->
            </div>
          </div>
        </div>

      </div>

      <!-- Controls -->
      <div class="absolute -bottom-16 flex gap-6">
        <button onclick="prevTestimonial()" class="nav-btn">&#10094;</button>
        <button onclick="nextTestimonial()" class="nav-btn">&#10095;</button>
      </div>

    </div>
  </div>
</section>
