<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fakultas Teknik - Universitas Negeri Manado')</title>
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
    </style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @stack('head')
    <!-- AOS Animate On Scroll CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    @include('partials.navbar')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset('js/main.js') }}"></script>
    <!-- AOS Animate On Scroll JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({
        once: true,
        duration: 800,
        easing: 'ease-out-cubic',
      });
    </script>
    @stack('scripts')
</body>
</html> 