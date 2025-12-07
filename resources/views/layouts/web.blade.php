<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Florascape - Premium Landscaping Services')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/web.css'])
</head>

<body>
    <header class="site-header">
        <div class="container flex justify-between items-center">
            <a href="{{ route('home') }}" class="logo">
                <span class="text-accent"
                    style="font-family: var(--font-heading); font-size: 1.5rem; font-weight: 700;">FLORA</span><span
                    style="font-family: var(--font-heading); font-size: 1.5rem; font-weight: 700; color: #fff;">SCAPE</span>
            </a>
            <nav>
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('services') }}" class="nav-link">Services</a>
                <a href="{{ route('about') }}" class="nav-link">About</a>
                <a href="{{ route('contact') }}" class="nav-link">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container grid md:grid-cols-3 gap-8">
            <div>
                <h4 class="text-accent">Florascape</h4>
                <p style="color: #999; margin-top: 1rem;">Transforming outdoor spaces into living works of art.
                    Dedicated to quality, sustainability, and beauty.</p>
            </div>
            <div>
                <h4 class="text-accent">Quick Links</h4>
                <div class="flex flex-col gap-4" style="margin-top: 1rem;">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('services') }}">Services</a>
                    <a href="{{ route('about') }}">About Us</a>
                    <a href="{{ route('contact') }}">Contact</a>
                </div>
            </div>
            <div>
                <h4 class="text-accent">Contact</h4>
                <p style="color: #999; margin-top: 1rem;">
                    123 Green Valley Way<br>
                    Springfield, ST 12345<br>
                    <br>
                    (555) 123-4567<br>
                    hello@florascape.com
                </p>
            </div>
        </div>
        <div class="container text-center" style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid #333;">
            <p style="color: #666;">&copy; {{ date('Y') }} Florascape. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Simple script to handle header transparency on scroll
        window.addEventListener('scroll', function () {
            const header = document.querySelector('.site-header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>