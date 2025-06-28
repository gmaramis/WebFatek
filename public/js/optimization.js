// Performance Optimization JavaScript

// Debounce function for scroll events
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function for resize events
function throttle(func, limit) {
    let inThrottle;
    return function () {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => (inThrottle = false), limit);
        }
    };
}

// Optimize scroll events
const optimizedScrollHandler = debounce(function () {
    // Add any scroll-based functionality here
}, 16); // ~60fps

// Optimize resize events
const optimizedResizeHandler = throttle(function () {
    // Add any resize-based functionality here
}, 250);

// Add event listeners
document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("scroll", optimizedScrollHandler);
    window.addEventListener("resize", optimizedResizeHandler);

    // Preload critical images
    const criticalImages = [
        '{{ asset("img/logo unima.png") }}',
        '{{ asset("img/logo blu.png") }}',
    ];

    criticalImages.forEach((src) => {
        const img = new Image();
        img.src = src;
    });
});

// Optimize AOS initialization
if (typeof AOS !== "undefined") {
    AOS.init({
        once: true,
        duration: 800,
        easing: "ease-out-cubic",
        disable: window.innerWidth < 768, // Disable on mobile for better performance
        throttleDelay: 99,
    });
}
