// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector(this.getAttribute('href'))
      .scrollIntoView({ behavior: 'smooth' });
  });
});

// =========== Nav Bar and mobile menu ===============
const menuBtn = document.getElementById('menuBtn');
const mobileMenu = document.getElementById('mobileMenu');
const mobileLinks = document.querySelectorAll('.mobile-link');

menuBtn.addEventListener('click', () => {
  if (mobileMenu.style.maxHeight) {
      mobileMenu.style.maxHeight = null;
  } else {
      mobileMenu.style.maxHeight = mobileMenu.scrollHeight + "px";
  }
});

// Close menu on link click
mobileLinks.forEach(link => {
link.addEventListener('click', () => {
    mobileMenu.style.maxHeight = null;
});
});
menuBtn.addEventListener("click", () => {
mobileMenu.classList.toggle("open");

if (mobileMenu.classList.contains("open")) {
    mobileMenu.style.maxHeight = mobileMenu.scrollHeight + "px";
    mobileMenu.classList.remove("opacity-0", "scale-95");
    mobileMenu.classList.add("opacity-100", "scale-100");
} else {
    mobileMenu.style.maxHeight = null;
    mobileMenu.classList.add("opacity-0", "scale-95", );
}
});

const navbar = document.getElementById("navbar");

window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    navbar.classList.add("shadow-md");
  } else {
    navbar.classList.remove("shadow-md");
  }
});

// =================== Scroll reveal =================

const reveals = document.querySelectorAll(".reveal");

const observer = new IntersectionObserver(
entries => {
    entries.forEach(entry => {
    if (entry.isIntersecting) {
        entry.target.classList.add("active");
    }
    });
},
{ threshold: 0.15 }
);

reveals.forEach(el => observer.observe(el));


// =========== hero section ==============

const slider = document.getElementById("heroSlider");
const dots = document.querySelectorAll(".hero-dot");
let currentSlide = 0;
const totalSlides = slider.children.length;

function goToSlide(index) {
  currentSlide = index;
  slider.style.transform = `translateX(-${currentSlide * 100}%)`;

  dots.forEach(dot => dot.classList.remove("active"));
  dots[currentSlide].classList.add("active");
}

// Auto slide
setInterval(() => {
  currentSlide = (currentSlide + 1) % totalSlides;
  goToSlide(currentSlide);
}, 5000);

// Dot click
dots.forEach((dot, i) => {
  dot.addEventListener("click", () => goToSlide(i));
});

//============== Igredients section animation ===================

 
/* 🔹 ELEMENTS */
  const ingredientSliderEl = document.getElementById("ingredientTrack");
  const ingredientCards = ingredientSliderEl.children;

  /* 🔹 STATE */
  let ingredientSlidePos = 0;
  let ingredientAutoTimer = null;
  const ingredientAutoDelay = 1000;

  /* 🔹 HELPERS */
  function calcIngredientCardWidth() {
    return ingredientCards[0].offsetWidth + 24; // gap-6
  }

  function renderIngredientSlide() {
    ingredientSliderEl.scrollTo({
      left: calcIngredientCardWidth() * ingredientSlidePos,
      behavior: "smooth"
    });
  }

  /* 🔹 AUTO SLIDE */
  function startIngredientAuto() {
    ingredientAutoTimer = setInterval(() => {
      ingredientSlidePos++;
      if (ingredientSlidePos >= ingredientCards.length) {
        ingredientSlidePos = 0;
      }
      renderIngredientSlide();
    }, ingredientAutoDelay);
  }

  function stopIngredientAuto() {
    clearInterval(ingredientAutoTimer);
  }

  function restartIngredientAuto() {
    stopIngredientAuto();
    startIngredientAuto();
  }

  /* 🔹 HOVER PAUSE */
  ingredientSliderEl.addEventListener("mouseenter", stopIngredientAuto);
  ingredientSliderEl.addEventListener("mouseleave", startIngredientAuto);

  /* 🔹 INIT */
  startIngredientAuto();


// ===================== benefits section ================

const benefitRows = document.querySelectorAll(".benefit-row");

const observers = new IntersectionObserver(
  entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
      }
    });
  },
  { threshold: 0.3 }
);

benefitRows.forEach(row => observers.observe(row));

// =========== Product Section ===============

const sliderTrack = document.getElementById("sliderTrack");
const slides = document.querySelectorAll(".slide");
const thumbs = document.querySelectorAll(".thumb");
const wrapper = document.querySelector(".main-image-wrapper");

let index = 0;
const slideDuration = 4000;
let autoSlide; // store interval

/* Update Slide */
function updateSlide(i){
  index = i;
  sliderTrack.style.transform = `translateX(-${index * 100}%)`;

  thumbs.forEach(t => t.classList.remove("active"));
  thumbs[index].classList.add("active");
}

/* Thumbnail Click */
thumbs.forEach(thumb => {
  thumb.addEventListener("click", () => {
    updateSlide(parseInt(thumb.dataset.index));
  });
});

/* Start Auto Slide */
function startAutoSlide() {
  autoSlide = setInterval(() => {
    index = (index + 1) % slides.length;
    updateSlide(index);
  }, slideDuration);
}

/* Stop Auto Slide */
function stopAutoSlide() {
  clearInterval(autoSlide);
}

/* Pause on Hover */
wrapper.addEventListener("mouseenter", stopAutoSlide);
wrapper.addEventListener("mouseleave", startAutoSlide);

/* Initialize */
startAutoSlide();

// zoom on mousehover Animation 

wrapper.addEventListener("mousemove", (e) => {
  const rect = wrapper.getBoundingClientRect();
  const x = e.clientX - rect.left;
  const y = e.clientY - rect.top;

  const percentX = (x / rect.width) * 100;
  const percentY = (y / rect.height) * 100;

  const activeSlide = slides[index]; // current slide

  activeSlide.style.transformOrigin = `${percentX}% ${percentY}%`;
  activeSlide.style.transform = "scale(1.6)";
});

wrapper.addEventListener("mouseleave", () => {
  slides[index].style.transform = "scale(1)";
  slides[index].style.transformOrigin = "center center";
});

let selectedPack = 1;
let selectedPrice = 2884;
let selectedOld = 3845;

const packButtons = document.querySelectorAll(".pack-btn");
const buyNowBtn = document.getElementById("buyNowBtn");

packButtons.forEach(btn => {
  btn.addEventListener("click", () => {

    // Remove active style
    packButtons.forEach(b => {
      b.classList.remove("text-white","bg-greentext");
      
    });

    // Add active style
    btn.classList.add("text-white","bg-greentext");


    selectedPack = btn.dataset.pack;
    selectedPrice = btn.dataset.price;
    selectedOld = btn.dataset.old;

    // Update price UI
    document.getElementById("mainPrice").innerText =
      "₹" + (selectedPack == 2 ? selectedPrice * 2 : selectedPrice);

    document.getElementById("oldPrice").innerText =
      "₹" + selectedOld;
  });
});

// Redirect with data
buyNowBtn.addEventListener("click", () => {
  window.location.href =
    `checkout.html?product=PSORIATIC%20COMBO&pack=${selectedPack}&price=${selectedPrice}`;
});
// =============== How to use Section ==============

  const card = document.querySelectorAll('.use-card');

  const observe = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1";
        entry.target.style.transform = "translateY(0)";
      }
    });
  }, { threshold: 0.2 });

  card.forEach(card => {
    card.style.opacity = "0";
    card.style.transform = "translateY(40px)";
    card.style.transition = "all 0.8s ease";
    observe.observe(card);
  });


// =========== FAQ Section ===============

const tabs = document.querySelectorAll(".faq-tab");
const answers = document.querySelectorAll(".faq-answer");

tabs.forEach(tab => {
  tab.addEventListener("click", () => {
    const id = tab.dataset.faq;

    tabs.forEach(t => t.classList.remove("active"));
    answers.forEach(a => a.classList.remove("active"));

    tab.classList.add("active");
    document.querySelector(`[data-answer="${id}"]`).classList.add("active");
  });
});

// =========== Testimonial Section ===============

const cards = document.querySelectorAll(".stack-card");
let currentIndexx = 0;

function updateTestimonials() {
  cards.forEach((card, index) => {
    card.classList.toggle("active", index === currentIndexx);
  });
}

function nextTestimonial() {
  currentIndexx = (currentIndexx + 1) % cards.length;
  updateTestimonials();
}

function prevTestimonial() {
  currentIndexx = (currentIndexx - 1 + cards.length) % cards.length;
  updateTestimonials();
}

/* Auto play */
setInterval(nextTestimonial, 5000);