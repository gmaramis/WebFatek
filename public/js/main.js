// JavaScript untuk Website Fakultas Teknik

// Fungsi untuk mengecek apakah elemen ada sebelum menggunakannya
function safeQuerySelector(selector) {
    try {
        return document.querySelector(selector);
    } catch (error) {
        console.warn(`Element not found: ${selector}`);
        return null;
    }
}

function safeQuerySelectorAll(selector) {
    try {
        return document.querySelectorAll(selector);
    } catch (error) {
        console.warn(`Elements not found: ${selector}`);
        return [];
    }
}

document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM loaded, initializing...");

    try {
        // Inisialisasi semua fungsi utama
        initHeroSlider();
        initNavigation();
        initScrollAnimations();
        initMobileMenu();
        initNavbarScroll();

        // Inisialisasi fitur tambahan
        initLazyLoading();
        initFormValidation();
        initSearch();

        // Add fade-in class to elements
        const sections = safeQuerySelectorAll("section");
        sections.forEach((section) => {
            section.classList.add("fade-in");
        });

        // Add card-hover class to program cards
        const programCards = safeQuerySelectorAll(
            ".bg-white.rounded-lg.shadow-lg"
        );
        programCards.forEach((card) => {
            card.classList.add("card-hover");
        });

        console.log("All functions initialized successfully");
    } catch (error) {
        console.error("Error during initialization:", error);
    }
});

// --- Hero Slider Otomatis dengan Animasi Modern ---
document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".hero-slider .slide");
    const dots = document.querySelectorAll(".slider-dot");
    let current = 0;
    let interval = null;
    const duration = 5000; // 5 detik per slide

    function showSlide(idx) {
        slides.forEach((slide, i) => {
            if (i === idx) {
                slide.classList.add("active");
                slide.style.opacity = 1;
                slide.style.zIndex = 2;
                slide.style.transform = "translateX(0) scale(1)";
            } else {
                slide.classList.remove("active");
                slide.style.opacity = 0;
                slide.style.zIndex = 1;
                slide.style.transform =
                    i < idx
                        ? "translateX(-30px) scale(0.98)"
                        : "translateX(30px) scale(0.98)";
            }
        });
        dots.forEach((dot, i) => {
            dot.classList.toggle("bg-white", i === idx);
            dot.classList.toggle("bg-white/50", i !== idx);
            dot.classList.toggle("scale-125", i === idx);
        });
    }

    function nextSlide() {
        current = (current + 1) % slides.length;
        showSlide(current);
    }

    function prevSlide() {
        current = (current - 1 + slides.length) % slides.length;
        showSlide(current);
    }

    // Dot navigation
    dots.forEach((dot, i) => {
        dot.addEventListener("click", () => {
            current = i;
            showSlide(current);
            resetInterval();
        });
    });

    // Arrow navigation
    const prevBtn = document.getElementById("prev-slide");
    const nextBtn = document.getElementById("next-slide");
    if (prevBtn && nextBtn) {
        prevBtn.addEventListener("click", () => {
            prevSlide();
            resetInterval();
        });
        nextBtn.addEventListener("click", () => {
            nextSlide();
            resetInterval();
        });
    }

    function resetInterval() {
        clearInterval(interval);
        interval = setInterval(nextSlide, duration);
    }

    // Inisialisasi
    showSlide(current);
    interval = setInterval(nextSlide, duration);
});

// Navigation Functionality
function initNavigation() {
    document.body.addEventListener("click", function (e) {
        // Cari tahu apakah yang diklik adalah sebuah link di dalam navigasi
        const link = e.target.closest("a.nav-link");
        if (!link) return; // Jika bukan, abaikan

        const href = link.getAttribute("href");
        if (!href) return; // Jika link tidak punya href, abaikan

        // Kondisi paling penting:
        // HANYA jalankan smooth scroll JIKA link adalah anchor di halaman yang sama.
        // Untuk SEMUA link lain (cth: 'pages/sejarah.html' atau '../index.html#home'),
        // jangan panggil e.preventDefault() dan biarkan browser bekerja normal.
        if (href.startsWith("#")) {
            e.preventDefault(); // Cegah aksi default HANYA untuk on-page scroll
            const targetElement = document.querySelector(href);
            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: "smooth",
                });
            }
        }
    });
}

// Mobile Menu Functionality
function initMobileMenu() {
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");

    if (mobileMenuBtn && mobileMenu) {
        const mobileNavLinks = mobileMenu.querySelectorAll(".nav-link");

        mobileMenuBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");

            // Animasi icon hamburger
            const icon = mobileMenuBtn.querySelector("i");
            if (mobileMenu.classList.contains("hidden")) {
                icon.classList.remove("fa-times");
                icon.classList.add("fa-bars");
            } else {
                icon.classList.remove("fa-bars");
                icon.classList.add("fa-times");
            }
        });

        // Tutup mobile menu saat link diklik
        mobileNavLinks.forEach((link) => {
            link.addEventListener("click", () => {
                mobileMenu.classList.add("hidden");
                const icon = mobileMenuBtn.querySelector("i");
                if (icon) {
                    icon.classList.remove("fa-times");
                    icon.classList.add("fa-bars");
                }
            });
        });
    }
}

// Navbar Scroll Effect
function initNavbarScroll() {
    const navbar = document.getElementById("navbar");
    if (!navbar) return;

    let lastScrollTop = 0;

    window.addEventListener("scroll", () => {
        const scrollTop =
            window.pageYOffset || document.documentElement.scrollTop;

        // Tambahkan background saat scroll
        if (scrollTop > 50) {
            navbar.classList.add(
                "bg-white/95",
                "backdrop-blur-sm",
                "shadow-lg"
            );
        } else {
            navbar.classList.remove(
                "bg-white/95",
                "backdrop-blur-sm",
                "shadow-lg"
            );
        }

        // Hide/show navbar saat scroll
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            // Scroll down
            navbar.style.transform = "translateY(-100%)";
        } else {
            // Scroll up
            navbar.style.transform = "translateY(0)";
        }

        lastScrollTop = scrollTop;
    });
}

// Scroll Animations
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
            }
        });
    }, observerOptions);

    const elementsToAnimate = safeQuerySelectorAll(
        ".fade-in, .slide-in-left, .slide-in-right, .zoom-in"
    );
    elementsToAnimate.forEach((el) => {
        observer.observe(el);
    });

    // Animate elements on scroll
    const animateOnScroll = () => {
        const elements = safeQuerySelectorAll(".card-hover, .program-card");

        elements.forEach((element) => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add("animate-fade-in");
            }
        });
    };

    window.addEventListener("scroll", animateOnScroll);
    animateOnScroll(); // Run once on load
}

// Utility Functions
function debounce(func, wait, immediate) {
    let timeout;
    return function executedFunction(...args) {
        const context = this;
        const later = () => {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

// Lazy Loading untuk gambar
function initLazyLoading() {
    const images = safeQuerySelectorAll("img[data-src]");

    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove("lazy");
                imageObserver.unobserve(img);
            }
        });
    });

    images.forEach((img) => imageObserver.observe(img));
}

// Form validation
function initFormValidation() {
    const forms = safeQuerySelectorAll("form");

    forms.forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            // Basic validation
            const inputs = form.querySelectorAll(
                "input[required], textarea[required]"
            );
            let isValid = true;

            inputs.forEach((input) => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add("border-red-500");
                } else {
                    input.classList.remove("border-red-500");
                }
            });

            if (isValid) {
                // Show success message
                showNotification("Pesan berhasil dikirim!", "success");
                form.reset();
            } else {
                showNotification(
                    "Mohon lengkapi semua field yang diperlukan.",
                    "error"
                );
            }
        });
    });
}

// Notification system
function showNotification(message, type = "info") {
    const notification = document.createElement("div");
    notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 transition-all duration-300 transform translate-x-full`;

    const colors = {
        success: "bg-green-500 text-white",
        error: "bg-red-500 text-white",
        info: "bg-blue-500 text-white",
        warning: "bg-yellow-500 text-white",
    };

    notification.className += ` ${colors[type]}`;
    notification.textContent = message;

    document.body.appendChild(notification);

    // Animate in
    setTimeout(() => {
        notification.classList.remove("translate-x-full");
    }, 100);

    // Remove after 3 seconds
    setTimeout(() => {
        notification.classList.add("translate-x-full");
        setTimeout(() => {
            if (document.body.contains(notification)) {
                document.body.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

// Search functionality
function initSearch() {
    const searchInput = safeQuerySelector("#search-input");
    if (searchInput) {
        searchInput.addEventListener(
            "input",
            debounce(function () {
                const query = this.value.toLowerCase();
                const searchableElements = safeQuerySelectorAll(".searchable");

                searchableElements.forEach((element) => {
                    const text = element.textContent.toLowerCase();
                    if (text.includes(query)) {
                        element.style.display = "block";
                    } else {
                        element.style.display = "none";
                    }
                });
            }, 300)
        );
    }
}

// Performance optimization
window.addEventListener("load", function () {
    // Remove loading states
    document.body.classList.remove("loading");

    // Preload critical resources
    const criticalImages = [
        // Add critical image paths here
    ];

    criticalImages.forEach((src) => {
        const img = new Image();
        img.src = src;
    });
});

// Error handling
window.addEventListener("error", function (e) {
    console.error("JavaScript error:", e.error);
    // You can add error reporting here
});

// Service Worker registration (for PWA features)
if ("serviceWorker" in navigator) {
    window.addEventListener("load", function () {
        navigator.serviceWorker
            .register("/sw.js")
            .then(function (registration) {
                console.log("SW registered: ", registration);
            })
            .catch(function (registrationError) {
                console.log("SW registration failed: ", registrationError);
            });
    });
}
