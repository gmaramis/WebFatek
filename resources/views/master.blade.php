<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Fakultas Teknik - Universitas Negeri Manado')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/logo-unima.png') }}">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="https://cdn.tailwindcss.com" as="script">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style">
    <link rel="preload" href="{{ asset('css/style.css') }}" as="style">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              DEFAULT: "#ea580c",
              50: "#fff7ed",
              100: "#ffedd5",
              200: "#fed7aa",
              300: "#fdba74",
              400: "#fb923c",
              500: "#f97316",
              600: "#ea580c",
              700: "#c2410c",
              800: "#9a3412",
              900: "#7c2d12",
            },
            secondary: {
              DEFAULT: "#1e293b",
              50: "#f8fafc",
              100: "#f1f5f9",
              200: "#e2e8f0",
              300: "#cbd5e1",
              400: "#94a3b8",
              500: "#64748b",
              600: "#475569",
              700: "#334155",
              800: "#1e293b",
              900: "#0f172a",
            },
            accent: {
              DEFAULT: "#f59e0b",
              50: "#fffbeb",
              100: "#fef3c7",
              200: "#fde68a",
              300: "#fcd34d",
              400: "#fbbf24",
              500: "#f59e0b",
              600: "#d97706",
              700: "#b45309",
              800: "#92400e",
              900: "#78350f",
            },
          },
        },
      },
    };
    </script>
    <style>
        /* Navbar Protection - Ensure navbar stays on top */
        header, nav, .bg-secondary-800 {
            position: relative !important;
            z-index: 9999 !important;
        }
        
        /* Ensure main content doesn't interfere with navbar */
        main {
            position: relative;
            z-index: 1;
        }
        
        /* Fix for any potential overflow issues */
        body {
            overflow-x: hidden;
        }
        
        /* Custom Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 12px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9; /* Light grey track */
        }
        ::-webkit-scrollbar-thumb {
            background-color: #64748b; /* Darker grey handle */
            border-radius: 6px;
            border: 3px solid #f1f5f9; /* Padding around handle */
        }
        
        /* Lazy loading placeholder */
        .lazy-image {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        .lazy-image.loaded {
            opacity: 1;
        }
        
        /* Navbar specific fixes */
        .nav-link {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            transform: translateY(-1px);
        }
        
        /* Mobile menu fixes */
        #mobile-menu {
            transition: all 0.3s ease;
        }
        
        #mobile-menu.hidden {
            display: none !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/optimization.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @stack('head')
    <!-- AOS Animate On Scroll CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    @include('partials.navbar')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/optimization.js') }}"></script>
    <!-- AOS Animate On Scroll JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      AOS.init({
        once: true,
        duration: 800,
        easing: 'ease-out-cubic',
      });
      
      // Lazy loading for images
      document.addEventListener('DOMContentLoaded', function() {
        const lazyImages = document.querySelectorAll('img[data-src]');
        
        const imageObserver = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const img = entry.target;
              img.src = img.dataset.src;
              img.classList.add('loaded');
              img.removeAttribute('data-src');
              observer.unobserve(img);
            }
          });
        });
        
        lazyImages.forEach(img => imageObserver.observe(img));
        
        // Ensure navbar is always visible
        const navbar = document.querySelector('header');
        if (navbar) {
            navbar.style.position = 'relative';
            navbar.style.zIndex = '9999';
        }
      });
    </script>
    @stack('scripts')
</body>
</html> 