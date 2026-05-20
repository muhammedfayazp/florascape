<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Google Tag Manager --}}
  @if($siteSettings && $siteSettings->gtm_id)
    <script>(function (w, d, s, l, i) {
        w[l] = w[l] || []; w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
        var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true; j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', '{{ $siteSettings->gtm_id }}');</script>
  @endif

  {{-- Google Analytics --}}
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
  <meta name="description" content="@yield('description', ($siteSettings->meta_description ?? 'Transform your outdoor space with Florascape - UAEs leading landscaping company.'))">
  <meta name="keywords" content="@yield('keywords', ($siteSettings->meta_keywords ?? 'landscaping UAE, garden design Dubai, landscape services'))">
  <meta name="author" content="{{ $siteSettings->site_name ?? 'Florascape Landscape LLC' }}">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="{{ url()->current() }}">

  {{-- Dynamic Favicon from Site Settings --}}
  @if($siteSettings && $siteSettings->favicon)
    <link rel="icon" type="image/x-icon" href="{{ image_url($siteSettings->favicon) }}">
  @else
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  @endif

  {{-- Open Graph / Facebook --}}
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="@yield('og_title', ($siteSettings->meta_title ?? 'Florascape - Premium Landscaping Services in UAE'))">
  <meta property="og:description" content="@yield('og_description', ($siteSettings->meta_description ?? 'Expert landscaping services transforming outdoor spaces across the UAE.'))">
  @php
    $ogImage = image_url($siteSettings->og_image ?? null, asset('images/og-image.jpg'));
  @endphp
  <meta property="og:image" content="{{ $ogImage }}">
  <meta property="og:site_name" content="{{ $siteSettings->site_name ?? 'Florascape' }}">
  <meta property="og:locale" content="en_AE">

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->current() }}">
  <meta name="twitter:title" content="@yield('twitter_title', ($siteSettings->meta_title ?? 'Florascape - Premium Landscaping Services in UAE'))">
  <meta name="twitter:description" content="@yield('twitter_description', ($siteSettings->meta_description ?? 'Expert landscaping services transforming outdoor spaces across the UAE.'))">
  <meta name="twitter:image" content="{{ $ogImage }}">

  {{-- JSON-LD Structured Data --}}
  @verbatim
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "{{ $siteSettings->site_name ?? 'Florascape Landscape LLC' }}",
    "image": "{{ url('/') }}/images/logo.png",
    "@id": "{{ url('/') }}",
    "url": "{{ url('/') }}",
    "telephone": "{{ $siteSettings->phone ?? '' }}",
    "email": "{{ $siteSettings->email ?? '' }}",
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
      "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
      "opens": "08:00",
      "closes": "18:00"
    },
    "sameAs": [
      "{{ $siteSettings->facebook_url ?? '' }}",
      "{{ $siteSettings->instagram_url ?? '' }}",
      "{{ $siteSettings->linkedin_url ?? '' }}"
    ],
    "areaServed": { "@type": "Country", "name": "United Arab Emirates" },
    "description": "{{ $siteSettings->meta_description ?? 'Professional landscaping services in UAE.' }}"
  }
  </script>
  @endverbatim

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  @viteReactRefresh
  @vite(['resources/css/web.css', 'resources/js/app.jsx'])
</head>

<body>
  {{-- GTM noscript --}}
  @if($siteSettings && $siteSettings->gtm_id)
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $siteSettings->gtm_id }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  @endif

  <header class="site-header">
    <div class="container flex justify-between items-center">
      <a href="{{ route('home') }}" class="logo" style="display: flex; align-items: center;">
        <img loading="lazy" src="{{ asset('images/florascape-logo.png') }}" alt="{{ config('app.name') }} Logo"
          style="height: 70px; width: auto;">
      </a>

      <button class="mobile-menu-btn" aria-label="Toggle Menu">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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

  {{-- ─── FOOTER ───────────────────────────────────────────────── --}}
  <footer class="site-footer">
    <div class="container grid md:grid-cols-3 gap-8">

      {{-- Column 1: Brand --}}
      <div>
        <h4 class="text-accent">{{ config('app.name') }}</h4>
        <p style="color: #999; margin-top: 1rem; line-height: 1.7;">
          {{ $siteSettings->footer_tagline ?? $siteSettings->meta_description ?? 'Transforming outdoor spaces into living works of art.' }}
        </p>

        {{-- Social Icons --}}
        <div class="flex gap-4" style="margin-top: 1.5rem; flex-wrap: wrap;">
          @if(optional($siteSettings)->facebook_url)
            <a href="{{ $siteSettings->facebook_url }}" target="_blank" rel="noopener noreferrer"
               title="Facebook" style="color: #aaa; transition: color 0.2s;"
               onmouseover="this.style.color='#4D9D45'" onmouseout="this.style.color='#aaa'">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
              </svg>
            </a>
          @endif
          @if(optional($siteSettings)->instagram_url)
            <a href="{{ $siteSettings->instagram_url }}" target="_blank" rel="noopener noreferrer"
               title="Instagram" style="color: #aaa; transition: color 0.2s;"
               onmouseover="this.style.color='#4D9D45'" onmouseout="this.style.color='#aaa'">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
              </svg>
            </a>
          @endif
          @if(optional($siteSettings)->linkedin_url)
            <a href="{{ $siteSettings->linkedin_url }}" target="_blank" rel="noopener noreferrer"
               title="LinkedIn" style="color: #aaa; transition: color 0.2s;"
               onmouseover="this.style.color='#4D9D45'" onmouseout="this.style.color='#aaa'">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/>
              </svg>
            </a>
          @endif
          @if(optional($siteSettings)->whatsapp_number)
            <a href="https://wa.me/{{ $siteSettings->whatsapp_number }}" target="_blank" rel="noopener noreferrer"
               title="WhatsApp" style="color: #aaa; transition: color 0.2s;"
               onmouseover="this.style.color='#25D366'" onmouseout="this.style.color='#aaa'">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                <path d="M12 0C5.373 0 0 5.373 0 12c0 2.117.549 4.105 1.514 5.832L.053 23.5l5.831-1.528A11.944 11.944 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.895 0-3.668-.524-5.178-1.434l-.371-.22-3.863 1.013 1.031-3.77-.241-.389A9.955 9.955 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
              </svg>
            </a>
          @endif
        </div>
      </div>

      {{-- Column 2: Quick Links --}}
      <div>
        <h4 class="text-accent">Quick Links</h4>
        <div class="flex flex-col gap-4" style="margin-top: 1rem;">
          <a href="{{ route('home') }}" style="color: #999; transition: color 0.2s;"
             onmouseover="this.style.color='#4D9D45'" onmouseout="this.style.color='#999'">Home</a>
          <a href="{{ route('services') }}" style="color: #999; transition: color 0.2s;"
             onmouseover="this.style.color='#4D9D45'" onmouseout="this.style.color='#999'">Services</a>
          <a href="{{ route('portfolio') }}" style="color: #999; transition: color 0.2s;"
             onmouseover="this.style.color='#4D9D45'" onmouseout="this.style.color='#999'">Portfolio</a>
          <a href="{{ route('about') }}" style="color: #999; transition: color 0.2s;"
             onmouseover="this.style.color='#4D9D45'" onmouseout="this.style.color='#999'">About Us</a>
          <a href="{{ route('contact') }}" style="color: #999; transition: color 0.2s;"
             onmouseover="this.style.color='#4D9D45'" onmouseout="this.style.color='#999'">Contact</a>
          <a href="{{ url('/sitemap.xml') }}" style="color: #999; transition: color 0.2s;"
             onmouseover="this.style.color='#4D9D45'" onmouseout="this.style.color='#999'">Sitemap</a>
        </div>
      </div>

      {{-- Column 3: Contact Details --}}
      <div>
        <h4 class="text-accent">Contact Us</h4>
        <div style="margin-top: 1rem; display: flex; flex-direction: column; gap: 1rem;">

          @if(optional($siteSettings)->address)
            <div style="display: flex; gap: 0.75rem; align-items: flex-start;">
              <span style="font-size: 1.1rem; flex-shrink: 0; margin-top: 0.1rem;">📍</span>
              <p style="color: #999; line-height: 1.6; margin: 0;">{!! nl2br(e($siteSettings->address)) !!}</p>
            </div>
          @endif

          @if(optional($siteSettings)->phone)
            <div style="display: flex; gap: 0.75rem; align-items: center;">
              <span style="font-size: 1.1rem; flex-shrink: 0;">📞</span>
              <a href="tel:{{ $siteSettings->phone }}" style="color: #999; transition: color 0.2s; text-decoration: none;"
                 onmouseover="this.style.color='#4D9D45'" onmouseout="this.style.color='#999'">
                {{ $siteSettings->phone }}
              </a>
            </div>
          @endif

          @if(optional($siteSettings)->email)
            <div style="display: flex; gap: 0.75rem; align-items: center;">
              <span style="font-size: 1.1rem; flex-shrink: 0;">✉️</span>
              <a href="mailto:{{ $siteSettings->email }}" style="color: #999; transition: color 0.2s; text-decoration: none;"
                 onmouseover="this.style.color='#4D9D45'" onmouseout="this.style.color='#999'">
                {{ $siteSettings->email }}
              </a>
            </div>
          @endif

          @if(optional($siteSettings)->whatsapp_number)
            <div style="display: flex; gap: 0.75rem; align-items: center;">
              <span style="font-size: 1.1rem; flex-shrink: 0;">💬</span>
              <a href="https://wa.me/{{ $siteSettings->whatsapp_number }}" target="_blank" rel="noopener noreferrer"
                 style="color: #999; transition: color 0.2s; text-decoration: none;"
                 onmouseover="this.style.color='#25D366'" onmouseout="this.style.color='#999'">
                WhatsApp Us
              </a>
            </div>
          @endif

        </div>
      </div>
    </div>

    {{-- Copyright Bar --}}
    <div class="container text-center" style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid #222;">
      <p style="color: #555; font-size: 0.9rem;">
        @if(optional($siteSettings)->footer_copyright)
          {!! $siteSettings->footer_copyright !!}
        @else
          &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endif
      </p>
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const header = document.querySelector('.site-header');
      window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 50);
      });

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
