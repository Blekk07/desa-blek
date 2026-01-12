<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Desa')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Allow pages to request a transparent navbar similar to landing page */
        .navbar.transparent {
            background: transparent !important;
            box-shadow: none !important;
            transition: all 0.3s ease;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/responsive-fixes.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Use shared partial navbar used in welcome page for consistency --}}
    @include('partials.navbar')

    <style>
        .navbar-nav .nav-link:hover {
            background: rgba(67, 97, 238, 0.08);
            border-radius: 6px;
            color: #3a0ca3 !important;
        }
        .navbar-nav .nav-link.active {
            background: rgba(67, 97, 238, 0.12);
            border-radius: 6px;
            color: #3a0ca3 !important;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        #mainNavbar.scrolled {
            background: rgba(255, 255, 255, 0.9) !important;
            box-shadow: 0 2px 8px rgba(20,30,60,0.1) !important;
            backdrop-filter: blur(5px);
        }
    </style>

    <script>
        let lastScrollTop = 0;
        const navbar = document.getElementById('mainNavbar');

        // Scroll behaviour: support pages that opt-in for transparent header
        window.addEventListener('scroll', function() {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (!navbar) return;

            if (currentScroll > 100) {
                navbar.classList.add('scrolled');
                // if the page requested auto transparency, remove it when scrolled
                if (navbar.dataset.autotransparent === 'true') {
                    navbar.classList.remove('transparent');
                }
            } else {
                navbar.classList.remove('scrolled');
                // restore transparent state only if page requested it
                if (navbar.dataset.autotransparent === 'true') {
                    navbar.classList.add('transparent');
                }
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        });
    </script>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-6">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center p-4 mt-10 border-t">
        &copy; {{ date('Y') }} Sistem Informasi Desa — All Rights Reserved
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html></body>
</html>
