<!doctype html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promosi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            background-color: #f5f7ff;
            transform: translateY(-6px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .footer {
            background-color: #f8f9fa;
        }

        /* === Dark Mode === */
        body.dark-mode {
            background-color: #121212 !important;
            color: #f5f5f5;
        }

        body.dark-mode .card {
            background-color: #1f1f1f;
            border-color: #333;
        }

        body.dark-mode .navbar {
            background-color: #1f1f1f !important;
        }

        body.dark-mode .btn-outline-primary {
            color: #ffffff;
            border-color: #888;
        }

        body.dark-mode footer,
        body.dark-mode .footer {
            background-color: #121212 !important;
            color: #f5f5f5 !important;
        }

        body.dark-mode h1,
        body.dark-mode h2,
        body.dark-mode h3,
        body.dark-mode h4,
        body.dark-mode h5,
        body.dark-mode p,
        body.dark-mode small,
        body.dark-mode .card-title,
        body.dark-mode .card-text,
        body.dark-mode .text-muted,
        body.dark-mode label {
            color: #f5f5f5 !important;
        }

        body.dark-mode input,
        body.dark-mode textarea,
        body.dark-mode select {
            background-color: #333 !important;
            color: #f5f5f5 !important;
            border: 1px solid #666 !important;
        }

        body.dark-mode input::placeholder,
        body.dark-mode textarea::placeholder {
            color: #bbb;
        }

        /* Smooth toggle dot animation */
        .dot {
            transition: transform 0.3s ease-in-out;
        }

        .dark-mode .dot {
            transform: translateX(28px);
        }
    </style>
</head>
<body class="bg-light text-dark" id="app">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm mb-4" id="main-navbar" style="background-color: #4A90E2;">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-4">
                {{-- Logo --}}
                <img src="{{ asset('logo/LogoPetra.jpg') }}" alt="LogoPetra" style="height: 60px; width: auto;">

                {{-- Menu Nav (Home & About Us) --}}
                <div class="d-flex gap-3">
                    <a href="{{ route('promotions.index') }}" class="text-white text-decoration-none fs-5">Home</a>
                    <a href="#about" class="text-white text-decoration-none fs-5">About Us</a>
                </div>
            </div>

            {{-- Dark Mode & Tambah Event --}}
            <div class="d-flex align-items-center gap-3">
                {{-- Toggle Dark Mode --}}
                <div id="darkModeToggle" class="relative w-14 h-8 bg-gray-300 rounded-full flex items-center justify-between px-1 cursor-pointer transition-colors duration-300">
                    <span class="text-yellow-400 text-xs">🌙</span>
                    <span class="text-yellow-100 text-xs">☀️</span>
                    <div class="dot absolute top-1 left-1 w-6 h-6 bg-white rounded-full shadow-md"></div>
                </div>

                {{-- Tombol Tambah Event --}}
                <a href="{{ route('promotions.create') }}" class="btn" style="background-color: #2D2D2D; color: #FFD700;">
                    + Tambah Event
                </a>
            </div>
        </div>
    </nav>

    {{-- Konten --}}
    <main class="container mb-3">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer id="about" class="w-full bg-[#4A90E2] text-white py-10 px-10 mt-16">
        <div class="max-w-7xl mx-auto text-left">
            <h2 class="text-3xl font-bold mb-2">Petra Event</h2>
            <p class="text-lg leading-relaxed">
                Sebuah website di mana semua info tentang event yang dilaksanakan oleh PCU dikumpulkan di sini.
            </p>
        </div>
    </footer>
    
    
    

    {{-- Dark Mode Toggle Script --}}
    <script>
        const toggle = document.getElementById('darkModeToggle');
        const html = document.documentElement;
        const body = document.body;

        // Load state
        if (localStorage.getItem('darkMode') === 'enabled') {
            html.classList.add('dark');
            body.classList.add('dark-mode');
        }

        toggle.addEventListener('click', function () {
            html.classList.toggle('dark');
            body.classList.toggle('dark-mode');

            if (html.classList.contains('dark')) {
                localStorage.setItem('darkMode', 'enabled');
            } else {
                localStorage.setItem('darkMode', 'disabled');
            }
        });
    </script>

    {{-- Smooth scroll for About Us --}}
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href'))
                    .scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>
</body>
</html>
