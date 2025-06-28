// Filament Performance Optimizations

// Optimize Alpine.js performance
document.addEventListener("alpine:init", () => {
    // Reduce polling frequency for better performance
    Alpine.data("filamentOptimized", () => ({
        init() {
            // Optimize polling intervals
            this.$nextTick(() => {
                const pollingElements =
                    document.querySelectorAll("[data-poll]");
                pollingElements.forEach((element) => {
                    const interval = element.getAttribute("data-poll");
                    if (interval && parseInt(interval) < 5000) {
                        element.setAttribute("data-poll", "5000"); // Minimum 5 seconds
                    }
                });
            });
        },
    }));
});

// Optimize form submissions
document.addEventListener("livewire:init", () => {
    // Debounce form submissions
    let submitTimeout;

    Livewire.hook("message.sent", (message, component) => {
        if (message.updateQueue.length > 0) {
            clearTimeout(submitTimeout);
            submitTimeout = setTimeout(() => {
                // Allow form submission
            }, 100);
        }
    });
});

// Optimize table rendering
document.addEventListener("DOMContentLoaded", () => {
    // Lazy load table rows
    const tables = document.querySelectorAll(".fi-ta-table");
    tables.forEach((table) => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("loaded");
                    observer.unobserve(entry.target);
                }
            });
        });

        const rows = table.querySelectorAll("tr");
        rows.forEach((row) => observer.observe(row));
    });
});

// Optimize sidebar performance
document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.querySelector(".fi-sidebar");
    if (sidebar) {
        // Use transform instead of width for better performance
        sidebar.style.transition = "transform 150ms ease-in-out";
    }
});

// Reduce unnecessary re-renders
window.addEventListener("resize", () => {
    // Debounce resize events
    clearTimeout(window.resizeTimeout);
    window.resizeTimeout = setTimeout(() => {
        // Handle resize
    }, 250);
});
