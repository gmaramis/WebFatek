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



    <style>
        #pz-wrap { touch-action: none; }
        #pz-img  { cursor: grab; will-change: transform; transform-origin: 0 0; }
        #pz-img.dragging { cursor: grabbing; }
      </style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
      const openBtn   = document.getElementById('open-lightbox');
      const imgThumb  = document.getElementById('org-image');
      const lightbox  = document.getElementById('lightbox');
      const closeBtn  = document.getElementById('lightbox-close');

      const wrap = document.getElementById('pz-wrap');
      const img  = document.getElementById('pz-img');

      // ===== State Pan & Zoom =====
      let scale = 1, minScale = 1, maxScale = 6;
      let tx = 0, ty = 0;         // translation (px)
      let isPointerDown = false;
      let startX = 0, startY = 0;
      let lastTx = 0, lastTy = 0;
      let naturalW = 0, naturalH = 0;

      function applyTransform() {
        img.style.transform = `translate(${tx}px, ${ty}px) scale(${scale})`;
      }

      function fitToContain() {
        if (!img || !wrap) return;
        const rect = wrap.getBoundingClientRect();

        // ukuran asli gambar
        naturalW = img.naturalWidth;
        naturalH = img.naturalHeight;
        if (!naturalW || !naturalH) return;

        // skala contain
        const scaleX = rect.width  / naturalW;
        const scaleY = rect.height / naturalH;
        const initial = Math.min(scaleX, scaleY);

        // set batas
        minScale = initial;
        scale    = initial;
        maxScale = Math.max(initial * 6, initial + 0.01); // kasih headroom zoom

        // center-kan gambar
        const contentW = naturalW * scale;
        const contentH = naturalH * scale;
        tx = (rect.width  - contentW) / 2;
        ty = (rect.height - contentH) / 2;

        applyTransform();
      }

      function openLightbox() {
        if (!lightbox) return;
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';

        // Pastikan gambar sudah load sebelum hitung fit
        if (img && img.complete) {
          fitToContain();
        } else if (img) {
          img.addEventListener('load', fitToContain, { once: true });
        }
      }

      function closeLightbox() {
        if (!lightbox) return;
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = '';
      }

      if (openBtn)  openBtn.addEventListener('click', openLightbox);
      if (imgThumb) imgThumb.addEventListener('click', openLightbox);
      if (closeBtn) closeBtn.addEventListener('click', closeLightbox);

      if (lightbox) {
        lightbox.addEventListener('click', (e) => {
          // tutup jika klik area gelap di luar viewport
          if (e.target === lightbox) closeLightbox();
        });
        document.addEventListener('keydown', (e) => {
          if (e.key === 'Escape') closeLightbox();
        });
      }

      // ===== Helpers =====
      function constrain() {
        const rect = wrap.getBoundingClientRect();
        const contentW = naturalW * scale;
        const contentH = naturalH * scale;

        // kalau lebih kecil dari viewport, center-kan
        const minTx = Math.min(0, rect.width  - contentW);
        const minTy = Math.min(0, rect.height - contentH);
        const maxTx = Math.max(0, rect.width  - contentW);
        const maxTy = Math.max(0, rect.height - contentH);

        // saat content lebih besar, izinkan pan di dalam batas
        tx = Math.min(0, Math.max(minTx, tx));
        ty = Math.min(0, Math.max(minTy, ty));

        // kalau content lebih kecil (scale == minScale) biar tetap center
        if (scale === minScale) {
          tx = (rect.width  - contentW) / 2;
          ty = (rect.height - contentH) / 2;
        }
      }

      function zoomAt(clientX, clientY, deltaY) {
        const rect = wrap.getBoundingClientRect();
        const x = clientX - rect.left;
        const y = clientY - rect.top;

        const zoomIntensity = 0.2;
        const wheel = -Math.sign(deltaY);
        let newScale = scale * (1 + wheel * zoomIntensity);
        newScale = Math.min(maxScale, Math.max(minScale, newScale));
        if (newScale === scale) return;

        // world coords sebelum zoom (berdasarkan origin top-left)
        const wx = (x - tx) / scale;
        const wy = (y - ty) / scale;

        scale = newScale;
        tx = x - wx * scale;
        ty = y - wy * scale;

        constrain();
        applyTransform();
      }

      // ===== Mouse wheel zoom =====
      if (wrap) {
        wrap.addEventListener('wheel', (e) => {
          e.preventDefault();
          zoomAt(e.clientX, e.clientY, e.deltaY);
        }, { passive: false });

        // ===== Drag pan (pointer) =====
        wrap.addEventListener('pointerdown', (e) => {
          if (e.button !== 0) return;
          isPointerDown = true;
          startX = e.clientX;
          startY = e.clientY;
          lastTx = tx;
          lastTy = ty;
          img.classList.add('dragging');
          wrap.setPointerCapture(e.pointerId);
        });

        wrap.addEventListener('pointermove', (e) => {
          if (!isPointerDown) return;
          const dx = e.clientX - startX;
          const dy = e.clientY - startY;
          tx = lastTx + dx;
          ty = lastTy + dy;
          constrain();
          applyTransform();
        });

        const endDrag = (e) => {
          if (!isPointerDown) return;
          isPointerDown = false;
          img.classList.remove('dragging');
          try { wrap.releasePointerCapture(e.pointerId); } catch {}
        };

        wrap.addEventListener('pointerup', endDrag);
        wrap.addEventListener('pointercancel', endDrag);
        wrap.addEventListener('pointerleave', endDrag);

        // ===== Double-click toggle zoom (min <-> 2x) =====
        wrap.addEventListener('dblclick', (e) => {
          e.preventDefault();
          const targetScale = (scale > minScale) ? minScale : Math.min(maxScale, minScale * 2);
          const rect = wrap.getBoundingClientRect();
          const x = e.clientX - rect.left;
          const y = e.clientY - rect.top;

          const wx = (x - tx) / scale;
          const wy = (y - ty) / scale;

          scale = targetScale;
          tx = x - wx * scale;
          ty = y - wy * scale;

          constrain();
          applyTransform();
        });

        // ===== Pinch zoom (mobile) =====
        let pinchDistStart = 0;
        let scaleStart = 1;

        wrap.addEventListener('touchstart', (e) => {
          if (e.touches.length === 2) {
            e.preventDefault();
            pinchDistStart = getTouchDist(e.touches);
            scaleStart = scale;
          }
        }, { passive: false });

        wrap.addEventListener('touchmove', (e) => {
          if (e.touches.length === 2) {
            e.preventDefault();
            const dist = getTouchDist(e.touches);
            const rect = wrap.getBoundingClientRect();
            const cx = (e.touches[0].clientX + e.touches[1].clientX) / 2;
            const cy = (e.touches[0].clientY + e.touches[1].clientY) / 2;

            const newScale = Math.min(maxScale, Math.max(minScale, scaleStart * (dist / pinchDistStart)));

            const x = cx - rect.left;
            const y = cy - rect.top;
            const wx = (x - tx) / scale;
            const wy = (y - ty) / scale;

            scale = newScale;
            tx = x - wx * scale;
            ty = y - wy * scale;

            constrain();
            applyTransform();
          }
        }, { passive: false });
      }

      function getTouchDist(touches) {
        const dx = touches[0].clientX - touches[1].clientX;
        const dy = touches[0].clientY - touches[1].clientY;
        return Math.hypot(dx, dy);
      }
    });
    </script>


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