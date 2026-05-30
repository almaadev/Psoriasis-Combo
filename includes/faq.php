<?php
/**
 * FAQ Component
 * Renders the accordion questions and answers section of the landing page.
 */
?>
<!-- ================= FAQ ================= -->
<section id="faq" class="overflow-hidden py-40">
  <div class="max-w-7xl mx-auto px-6">

    <!-- Heading -->
    <div class="text-center mb-20 reveal">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">
        Questions? <span class="text-greentext">We&#39;ve Got Answers</span>
      </h2>
      <p class="text-gray-600 max-w-xl mx-auto">
        Clear, honest answers to help you decide with confidence 😇
      </p>
    </div>

    <!-- FAQ Layout -->
    <div class="grid lg:grid-cols-2 gap-16 items-center">

      <!-- QUESTIONS -->
      <div>
        <h2 class="text-xl mb-5 font-medium text-greentext">Questions</h2>
        <div class="space-y-4 reveal">
          <button class="faq-tab active" data-faq="1">
            1. Is this combo suitable for long-term use?
          </button>
          <button class="faq-tab" data-faq="2">
            2. Can this be used along with other medications?
          </button>
          <button class="faq-tab" data-faq="3">
            3. Is the oil for external use?
          </button>
          <button class="faq-tab" data-faq="4">
            4. How long does it take to notice changes?
          </button>
          <button class="faq-tab" data-faq="5">
            5. Does this combo contain steroids?
          </button>
        </div>
      </div>

      <!-- ANSWER PANEL -->
      <div>
        <h2 class="text-xl font-medium text-greentext mb-5">Answer</h2>
        <div class="faq-panel reveal">
          <!-- Faq Answer 1 -->
          <div class="faq-answer active space-y-5" data-answer="1">
            <h3 class="text-xl md:text-2xl font-semibold text-greentext">Long-term Support</h3>
            <p class="text-base">
              The formulations are traditionally used for long-term skin wellness support. Kindly consult a Siddha doctor for personalised guidance.
            </p>
          </div>
          <!-- Faq Answer 2 -->
          <div class="faq-answer space-y-5" data-answer="2">
            <h3 class="text-xl md:text-2xl font-semibold text-greentext">Consult Your Doctor</h3>
            <p class="text-base">
              Please consult your healthcare professional before combining with other treatments.
            </p>
          </div>
          <!-- Faq Answer 3 -->
          <div class="faq-answer space-y-5" data-answer="3">
            <h3 class="text-xl md:text-2xl font-semibold text-greentext">External Use Only</h3>
            <p class="text-base">
              Yes, Psora 111 Oil is intended for external application only.
            </p>
          </div>
          <!-- Faq Answer 4 -->
          <div class="faq-answer space-y-5" data-answer="4">
            <h3 class="text-xl md:text-2xl font-semibold text-greentext">Gradual, Natural Results</h3>
            <p class="text-base">
              Individual response may vary depending on skin condition, lifestyle, and consistency of usage.
            </p>
          </div>
          <!-- Faq Answer 5 -->
          <div class="faq-answer space-y-5" data-answer="5">
            <h3 class="text-xl md:text-2xl font-semibold text-greentext">Steroid-Free Formulation</h3>
            <p class="text-base">
              The combo is based on traditional Siddha herbal formulations.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
