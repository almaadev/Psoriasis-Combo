<?php
/**
 * Contact Section Component
 * Renders the landing page's main Contact & Map section.
 */
?>
<!-- ================= Contact Section ===============-->
<section id="contact" class="py-24">
  <div class="max-w-7xl mx-auto px-6">
      <div class="flex flex-col items-center mb-4 md:mb-20">
        <h2 class="text-3xl md:text-5xl font-bold font-heading text-center">Contact Us</h2>
        <p class="mt-5 md:mt-2 text-sm md:text-base text-gray-600 mb-3 font-semibold text-center">We&#8217;re here to help your healing journey 🌿</p>
      </div>
      <div class="grid md:grid-cols-2 gap-12 items-start">
        <!-- CONTACT FORM -->
        <div class="bg-white shadow-xl rounded-3xl p-8 h-[500px]">
          <div class="space-y-6">
            <h4 class="text-xl font-semibold px-3">ALMAA HERBAL NATURE Pvt Ltd</h4>
            <!-- address -->
            <div class="space-y-2">
              <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor" class="text-greentext">
                  <path d="M536.5-503.5Q560-527 560-560t-23.5-56.5Q513-640 480-640t-56.5 23.5Q400-593 400-560t23.5 56.5Q447-480 480-480t56.5-23.5ZM480-186q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186ZM480-80Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80ZM480-480Z"/>
                </svg>
                <h2 class="font-semibold text-greentext">Address</h2>
              </div>
              <div class="px-5">
                <p>#10, Pillaiyar Koil Street, Saidapet, Chennai - 600015, Tamil Nadu, India</p>
              </div>
            </div>
            <!-- E mail -->
            <div class="space-y-2">
              <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor" class="text-greentext">
                  <path d="M480-440 160-640v400h360v80H160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v280h-80v-200L480-440Zm0-80 320-200H160l320 200ZM760-40l-56-56 63-64H600v-80h167l-64-64 57-56 160 160L760-40ZM160-640v440-240 3-283 80Z"/>
                </svg>
                <h2 class="font-semibold text-greentext">Email</h2>
              </div>
              <div class="px-5">
                <p>almaahospital@gmail.com</p>
              </div>
            </div>
            <!-- Phone -->
            <div class="space-y-2">
              <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor" class="text-greentext">
                  <path d="M760-480q0-117-81.5-198.5T480-760v-80q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480h-80Zm-160 0q0-50-35-85t-85-35v-80q83 0 141.5 58.5T680-480h-80Zm198 360q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z"/>
                </svg>
                <h2 class="font-semibold text-greentext">Phone</h2>
              </div>
              <div class="px-5">
                <p>+91-7401403008</p>
              </div>
            </div>
            <!-- Watsapp -->
            <div class="space-y-2">
              <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="24" height="24" fill="currentColor" class="text-greentext">
                  <path d="M16 2.933A13.067 13.067 0 0 0 4.133 21.6L2 30l8.533-2.067A13.067 13.067 0 1 0 16 2.933zm0 23.867a10.74 10.74 0 0 1-5.467-1.5l-.4-.233-5.067 1.233 1.333-4.933-.267-.433A10.733 10.733 0 1 1 16 26.8zm5.867-8.033c-.333-.167-1.967-.967-2.267-1.067-.3-.1-.533-.167-.767.167-.233.333-.9 1.067-1.1 1.3-.2.233-.4.267-.733.1-.333-.167-1.4-.517-2.667-1.65-.983-.867-1.65-1.933-1.833-2.267-.183-.333-.017-.517.15-.683.15-.15.333-.4.5-.6.167-.2.233-.333.35-.567.117-.233.058-.433-.029-.6-.087-.167-.767-1.85-1.05-2.533-.275-.667-.55-.583-.767-.6-.2-.017-.433-.017-.667-.017s-.6.083-.917.433c-.317.35-1.2 1.167-1.2 2.85s1.233 3.3 1.4 3.533c.167.233 2.417 3.683 5.85 5.167.817.35 1.45.567 1.95.733.817.267 1.567.233 2.15.142.658-.1 1.967-.8 2.25-1.567.283-.767.283-1.425.2-1.567-.083-.142-.3-.233-.633-.4z"/>
                </svg>
                <h2 class="font-semibold text-greentext">Whatsapp</h2>
              </div>
              <div class="px-5">
                <p>+91-7401403008</p>
              </div>
            </div>
          </div>
        </div>
        <!-- MAP -->
        <div class="rounded-3xl overflow-hidden shadow-xl h-[500px]">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d485.89702549023906!2d80.22468991043931!3d13.024448637973173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526655c38d2993%3A0x54b714477f05829b!2sAlmaa%20Siddha%20Care%20Multispeciality%20Hospital!5e0!3m2!1sen!2sin!4v1771222747276!5m2!1sen!2sin"
            class="w-full h-full border-0"
            loading="lazy">
          </iframe>
        </div>
      </div>
  </div>
</section>
