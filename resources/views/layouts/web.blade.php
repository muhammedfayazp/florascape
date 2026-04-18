  <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Google Tag Manager --}}
  @if($siteSettings && $siteSettings->gtm_id)
    <script>(function (w, d, s, l, i) {
        w[l] = w[l] || []; w[l].push({
          'gtm.start':
            new Date().getTime(), event: 'gtm.js'
        }); var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', '{{ $siteSettings->gtm_id }}');</script>
  @endif

  {{-- Google Analytics (gtag.js) --}}
  @if($siteSettings && $siteSettings->google_analytics_id)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $siteSettings->google_analytics_id }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag('js', new Date());
      gtag('config', '{{ $siteSettings->google_analytics_id }}');
    </script>
  @endif

  {!! $siteSettings->header_scripts ?? '' !!}

  {{-- SEO Meta Tags --}}
  <title>@yield('title', ($siteSettings->meta_title ?? 'Florascape - Premium Landscaping Services in UAE'))</title>
  <meta name="description"
    content="@yield('description', ($siteSettings->meta_description ?? 'Transform your outdoor space with Florascape - UAEs leading landscaping company.'))">
  <meta name="keywords"
    content="@yield('keywords', ($siteSettings->meta_keywords ?? 'landscaping UAE, garden design Dubai, landscape services'))">
  <meta name="author" content="{{ $siteSettings->site_name ?? 'Florascape Landscape LLC' }}">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="{{ url()->current() }}">

  @if($siteSettings && $siteSettings->favicon)
    <link rel="icon" type="image/x-icon" href="{{ \Illuminate\Support\Facades\Storage::url($siteSettings->favicon) }}">
  @endif

  {{-- Open Graph / Facebook --}}
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title"
    content="@yield('og_title', ($siteSettings->meta_title ?? 'Florascape - Premium Landscaping Services in UAE'))">
  <meta property="og:description"
    content="@yield('og_description', ($siteSettings->meta_description ?? 'Expert landscaping services transforming outdoor spaces across the UAE.'))">
  @php
    $ogImage = $siteSettings && $siteSettings->og_image ? \Illuminate\Support\Facades\Storage::url($siteSettings->og_image) : asset('images/og-image.jpg');
  @endphp
  <meta property="og:image" content="{{ $ogImage }}">
  <meta property="og:site_name" content="{{ $siteSettings->site_name ?? 'Florascape' }}">
  <meta property="og:locale" content="en_AE">

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->current() }}">
  <meta name="twitter:title"
    content="@yield('twitter_title', ($siteSettings->meta_title ?? 'Florascape - Premium Landscaping Services in UAE'))">
  <meta name="twitter:description"
    content="@yield('twitter_description', ($siteSettings->meta_description ?? 'Expert landscaping services transforming outdoor spaces across the UAE.'))">
  <meta name="twitter:image" content="{{ $ogImage }}">

  {{-- JSON-LD Structured Data (Dynamic) --}}
    @verbatim
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "{{ $siteSettings->site_name ?? 'Florascape Landscape LLC' }}",
      "image": "{{ url('/') }}/images/logo.png",
      "@id": "{{ url('/') }}",
      "url": "{{ url('/') }}",
      "telephone": "{{ $siteSettings->phone ?? '+971-XXX-XXXX' }}",
      "email": "{{ $siteSettings->email ?? 'hello@florascape.com' }}",
      "priceRange": "$$",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "{{ $siteSettings->address ?? 'UAE' }}",
        "addressLocality": "Abu Dhabi",
        "addressRegion": "Abu Dhabi",
        "addressCountry": "AE"
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        "opens": "08:00",
        "closes": "18:00"
      },
      "sameAs": [
        "{{ $siteSettings->facebook_url ?? 'https://www.facebook.com/florascape' }}",
        "{{ $siteSettings->instagram_url ?? 'https://www.instagram.com/florascape' }}",
        "{{ $siteSettings->linkedin_url ?? 'https://www.linkedin.com/company/florascape' }}"
      ],
      "areaServed": {
        "@type": "Country",
        "name": "United Arab Emirates"
      },
      "description": "{{ $siteSettings->meta_description ?? 'Professional landscaping services in UAE.' }}"
    }
    </script>
  @endverbatim
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;500;700&display=swap"
    rel="stylesheet">

  <!-- Styles -->
  @viteReactRefresh
  @vite(['resources/css/web.css', 'resources/js/app.jsx'])
</head>

<body>
  {{-- Google Tag Manager (noscript) --}}
  @if($siteSettings && $siteSettings->gtm_id)
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $siteSettings->gtm_id }}" height="0" width="0"
        style="display:none;visibility:hidden"></iframe></noscript>
  @endif
  <header class="site-header">
    <div class="container flex justify-between items-center">
      <a href="{{ route('home') }}" class="logo" style="display: flex; align-items: center;">
        <img loading="lazy" src="{{ asset('images/florascape-logo.png') }}" alt="{{ config('app.name') }} Logo"
          style="height: 70px; width: auto;">
      </a>

      <button class="mobile-menu-btn" aria-label="Toggle Menu">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>

      <nav id="main-nav">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
        <a href="{{ route('services') }}" class="nav-link">Services</a>
        <a href="{{ route('portfolio') }}" class="nav-link">Portfolio</a>
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
        <h4 class="text-accent">{{ config('app.name') }}</h4>
        <p style="color: #999; margin-top: 1rem;">
          {{ $siteSettings->meta_description ?? 'Transforming outdoor spaces into living works of art.' }}</p>

        <div class="flex gap-4" style="margin-top: 1.5rem;">
            @if(optional($siteSettings)->facebook_url)
                <a href="{{ $siteSettings->facebook_url }}" target="_blank" style="color: white; font-size: 1.5rem;">FB</a>
            @endif

            @if(optional($siteSettings)->instagram_url)
                <a href="{{ $siteSettings->instagram_url }}" target="_blank" style="color: white; font-size: 1.5rem;">IG</a>
            @endif

            @if(optional($siteSettings)->linkedin_url)
                <a href="{{ $siteSettings->linkedin_url }}" target="_blank" style="color: white; font-size: 1.5rem;">IN</a>
            @endif

            @if(optional($siteSettings)->whatsapp_number)
                <a href="https://wa.me/{{ $siteSettings->whatsapp_number }}" target="_blank" style="color: white; font-size: 1.5rem;">WA</a>
            @endif
        </div>
      </div>
      <div>
        <h4 class="text-accent">Quick Links</h4>
        <div class="flex flex-col gap-4" style="margin-top: 1rem;">
          <a href="{{ route('home') }}">Home</a>
          <a href="{{ route('services') }}">Services</a>
          <a href="{{ route('portfolio') }}">Portfolio</a>
          <a href="{{ route('about') }}">About Us</a>
          <a href="{{ route('contact') }}">Contact</a>
          <a href="{{ url('/sitemap.xml') }}">Sitemap</a>
        </div>
      </div>
      <div>
        <h4 class="text-accent">Contact</h4>
        <p style="color: #999; margin-top: 1rem;">
          @if(optional($siteSettings)->address)
            {!! nl2br(e($siteSettings->address)) !!}<br><br>
          @endif
          @if(optional($siteSettings)->phone)
            {{ $siteSettings->phone }}<br>
          @endif
          @if(optional($siteSettings)->email)
            {{ $siteSettings->email }}
          @endif
        </p>
      </div>
    </div>
    <div class="container text-center" style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid #333;">
      <p style="color: #666;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Simple script to handle header transparency on scroll
    // One-time setup for scroll and mobile menu
    document.addEventListener('DOMContentLoaded', () => {
      // Scroll effect
      const header = document.querySelector('.site-header');
      window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
      });

      // Mobile menu toggle
      const menuBtn = document.querySelector('.mobile-menu-btn');
      const nav = document.getElementById('main-nav');

      if (menuBtn && nav) {
        menuBtn.addEventListener('click', () => {
          menuBtn.classList.toggle('active');
          nav.classList.toggle('active');
          document.body.classList.toggle('no-scroll');
        });
      }
    });
  </script>
  {!! $siteSettings->footer_scripts ?? '' !!}
</body>

</html>
