@extends('layouts.web')

@section('content')

@php
    $heroSlidesData = collect($heroSlides?->slides ?? [])->map(function (array $slide) {
        $slide['image'] = !empty($slide['image']) && !Str::startsWith($slide['image'], 'http')
            ? \Illuminate\Support\Facades\Storage::url($slide['image'])
            : ($slide['image'] ?? null);
        return $slide;
    })->values();

    $galleryCategoriesData = $categories->map(function ($category) {
        $categoryArray = $category->toArray();
        $categoryArray['projects'] = collect($categoryArray['projects'] ?? [])->map(function (array $project) {
            $project['image'] = !empty($project['image']) && !Str::startsWith($project['image'], 'http')
                ? \Illuminate\Support\Facades\Storage::url($project['image'])
                : ($project['image'] ?? null);
            return $project;
        })->values()->all();
        return $categoryArray;
    })->values();
@endphp

{{-- ═══════════════════════════════════════════════
     HERO SLIDER
═══════════════════════════════════════════════ --}}
<div id="hero-slider-root" data-initial-slides='@json($heroSlidesData)'></div>

{{-- ═══════════════════════════════════════════════
     STATS BAR
═══════════════════════════════════════════════ --}}
<section class="stats-bar">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-number">500<span class="stat-plus">+</span></span>
                <span class="stat-label">Projects Completed</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <span class="stat-number">12<span class="stat-plus">+</span></span>
                <span class="stat-label">Years of Excellence</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <span class="stat-number">80<span class="stat-plus">+</span></span>
                <span class="stat-label">Expert Specialists</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
                <span class="stat-number">98<span class="stat-plus">%</span></span>
                <span class="stat-label">Client Satisfaction</span>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════
     ABOUT US SECTION
═══════════════════════════════════════════════ --}}
@if(isset($sections['about_us']))
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="about-image">
                @php
                    $aboutImage = $sections['about_us']->image;
                    $aboutImageUrl = $aboutImage && !Str::startsWith($aboutImage, 'http')
                        ? \Illuminate\Support\Facades\Storage::url($aboutImage)
                        : $aboutImage;
                @endphp
                <div class="about-img-wrapper">
                    <img loading="lazy"
                        src="{{ $aboutImageUrl ?? 'https://images.unsplash.com/photo-1598902108854-10e335adac99?auto=format&fit=crop&w=1200&q=80' }}"
                        alt="{{ $sections['about_us']->title }}">
                    <div class="about-badge">
                        <span class="badge-number">12+</span>
                        <span class="badge-text">Years of Trust</span>
                    </div>
                </div>
            </div>
            <div class="about-text">
                <p class="about-label">{{ $sections['about_us']->subtitle ?? 'About Us' }}</p>
                <h2 class="about-heading">{{ $sections['about_us']->title }}</h2>
                @if($sections['about_us']->content)
                    @foreach($sections['about_us']->content as $item)
                        <p class="about-paragraph">{{ $item['description'] ?? '' }}</p>
                    @endforeach
                @endif
                <div class="about-cta">
                    <a href="{{ route('about') }}" class="btn btn-primary">Our Story</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-green">Free Consultation</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════
     SERVICES / EXPERTISE SECTION
═══════════════════════════════════════════════ --}}
@if(isset($sections['our_expertise']))
<section class="expertise-section section bg-off-white">
    <div class="container">
        <div class="section-header text-center">
            <p class="section-label">What We Do</p>
            <h2 class="text-primary">{{ $sections['our_expertise']->title }}</h2>
            <p class="section-subtitle">{{ $sections['our_expertise']->subtitle }}</p>
        </div>
        <div class="expertise-grid">
            @if($sections['our_expertise']->content)
                @foreach($sections['our_expertise']->content as $item)
                <a href="{{ route('services') }}" class="expertise-card">
                    <div class="expertise-icon">{{ $item['icon'] ?? ($item['image'] ?? '✨') }}</div>
                    <h3 class="expertise-title">{{ $item['title'] ?? '' }}</h3>
                    <p class="expertise-desc">{{ $item['description'] ?? '' }}</p>
                    <span class="expertise-link">Learn More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></span>
                </a>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════
     COST CALCULATOR
═══════════════════════════════════════════════ --}}
@if(isset($sections['cost_calculator']) && $siteSettings->show_calculator)
<section class="calculator-section">
    <div class="container">
        <div id="cost-calculator-root"
             data-title="{{ $sections['cost_calculator']->title }}"
             data-subtitle="{{ $sections['cost_calculator']->subtitle }}"
             data-content='@json($sections['cost_calculator']->content)'></div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════
     GALLERY / PORTFOLIO
═══════════════════════════════════════════════ --}}
<section id="gallery" class="gallery-section">
    {{-- <div class="container">
        <div class="section-header text-center" style="margin-bottom:3rem;">
            <p class="section-label">Our Portfolio</p>
            <h2 class="gallery-heading">Transforming Visions Into Reality</h2>
            <p class="gallery-subtitle">Explore our collection of completed projects — each one a testament to our passion for excellence.</p>
        </div>
    </div> --}}
    <div id="gallery-root" data-initial-data='@json($galleryCategoriesData)'></div>
</section>

{{-- ═══════════════════════════════════════════════
     WHY CHOOSE US
═══════════════════════════════════════════════ --}}
@if(isset($sections['why_choose_us']))
<section class="why-section section">
    <div class="container">
        <div class="why-content">
            <div class="why-image">
                @php
                    $whyImage = $sections['why_choose_us']->image;
                    $whyImageUrl = $whyImage && !Str::startsWith($whyImage, 'http')
                        ? \Illuminate\Support\Facades\Storage::url($whyImage)
                        : $whyImage;
                @endphp
                <img loading="lazy"
                    src="{{ $whyImageUrl ?? 'https://images.unsplash.com/photo-1600596542815-e495d915993a?auto=format&fit=crop&w=1000&q=80' }}"
                    alt="{{ $sections['why_choose_us']->title }}">
            </div>
            <div class="why-text">
                <p class="section-label">The Florascape Difference</p>
                <h2 class="text-primary">{{ $sections['why_choose_us']->title }}</h2>
                <p class="why-subtitle">{{ $sections['why_choose_us']->subtitle }}</p>
                <div class="why-features">
                    @if($sections['why_choose_us']->content)
                        @foreach($sections['why_choose_us']->content as $item)
                        <div class="why-feature-item">
                            <div class="why-feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="why-feature-title">{{ $item['title'] ?? '' }}</h4>
                                <p class="why-feature-desc">{{ $item['description'] ?? '' }}</p>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════
     TESTIMONIAL STRIP
═══════════════════════════════════════════════ --}}
<section class="testimonial-section">
    <div class="container">
        <div class="section-header text-center" style="margin-bottom:3rem;">
            <p class="section-label" style="color:var(--color-accent);">Client Stories</p>
            <h2 style="color:white;">What Our Clients Say</h2>
        </div>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"Florascape transformed our barren villa garden into a stunning oasis. The team was professional, punctual, and the results exceeded all our expectations."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">SA</div>
                    <div>
                        <p class="testimonial-name">Sultan Al Amri</p>
                        <p class="testimonial-role">Villa Owner, Abu Dhabi</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"Their smart irrigation system cut our water usage by 35%. The Florascape team understood our commercial needs perfectly and delivered on time."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">MK</div>
                    <div>
                        <p class="testimonial-name">Maria Kowalski</p>
                        <p class="testimonial-role">Facilities Manager, Dubai</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"The living wall they installed in our hotel lobby has become a landmark. Guests constantly photograph it. Florascape are true artists."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">AH</div>
                    <div>
                        <p class="testimonial-name">Ahmed Al Hashimi</p>
                        <p class="testimonial-role">Hotel Director, Sharjah</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════
     FOOTER CTA
═══════════════════════════════════════════════ --}}
@if(isset($sections['footer_cta']))
<section class="footer-cta-section section bg-primary text-center">
    <div class="container">
        <div class="cta-inner">
            <h2 style="color:white;margin-bottom:1rem;">{{ $sections['footer_cta']->title }}</h2>
            <p style="color:rgba(255,255,255,.88);margin-bottom:2.5rem;font-size:1.15rem;max-width:600px;margin-left:auto;margin-right:auto;">
                {{ $sections['footer_cta']->subtitle }}
            </p>
            @php
                $btnText = $sections['footer_cta']->content[0]['description'] ?? 'Book a Free Consultation';
                $btnLink = $sections['footer_cta']->content[1]['description'] ?? route('contact');
            @endphp
            <div class="cta-buttons">
                <a href="{{ $btnLink }}" class="btn cta-btn-primary">{{ $btnText }}</a>
                <a href="{{ route('portfolio') }}" class="btn cta-btn-outline">View Our Work</a>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════
     INLINE STYLES — scoped to welcome page
═══════════════════════════════════════════════ --}}
<style>
/* ── Stats Bar ─────────────────────────────── */
.stats-bar {
    background: var(--color-bg-dark);
    padding: 2rem 0;
    border-bottom: 1px solid #222;
}
.stats-grid {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 0;
}
.stat-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem 3rem;
}
.stat-number {
    font-family: var(--font-heading);
    font-size: 2.6rem;
    font-weight: 700;
    color: var(--color-accent);
    line-height: 1;
}
.stat-plus {
    font-size: 1.8rem;
    color: var(--color-accent);
}
.stat-label {
    font-size: .85rem;
    color: #aaa;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: .4rem;
}
.stat-divider {
    width: 1px;
    height: 48px;
    background: #333;
}
@media (max-width: 640px) {
    .stats-grid   { gap: 1rem; }
    .stat-item    { padding: .75rem 1.5rem; }
    .stat-divider { display: none; }
    .stat-number  { font-size: 2rem; }
}

/* ── About Section ──────────────────────────── */
.about-img-wrapper {
    position: relative;
}
.about-badge {
    position: absolute;
    bottom: -1.5rem;
    right: -1.5rem;
    background: var(--color-primary);
    color: white;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 24px rgba(77,157,69,.4);
}
.badge-number {
    font-family: var(--font-heading);
    font-size: 1.6rem;
    font-weight: 700;
    line-height: 1;
}
.badge-text {
    font-size: .65rem;
    opacity: .9;
    text-align: center;
    line-height: 1.2;
}
.about-cta {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-top: 2rem;
}
.btn-outline-green {
    border: 2px solid var(--color-primary);
    color: var(--color-primary);
    background: transparent;
}
.btn-outline-green:hover {
    background: var(--color-primary);
    color: white;
}
@media (max-width: 768px) {
    .about-badge { width: 80px; height: 80px; right: -.5rem; bottom: -.5rem; }
    .badge-number { font-size: 1.3rem; }
}

/* ── Section Headers ────────────────────────── */
.section-header { margin-bottom: 3.5rem; }
.section-label {
    font-size: .85rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--color-accent);
    font-weight: 600;
    margin-bottom: .5rem;
}
.section-subtitle {
    color: #666;
    max-width: 640px;
    margin: .75rem auto 0;
    font-size: 1.05rem;
    line-height: 1.7;
}

/* ── Expertise Grid ─────────────────────────── */
.expertise-section { padding: 5rem 0; }
.expertise-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}
.expertise-card {
    background: white;
    border-radius: 12px;
    padding: 2rem 1.75rem;
    text-decoration: none;
    color: inherit;
    border: 2px solid transparent;
    transition: all .3s ease;
    box-shadow: 0 2px 12px rgba(0,0,0,.06);
    display: flex;
    flex-direction: column;
}
.expertise-card:hover {
    border-color: var(--color-primary);
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(77,157,69,.12);
}
.expertise-icon { font-size: 2.5rem; margin-bottom: 1rem; }
.expertise-title {
    font-size: 1.05rem;
    font-weight: 700;
    margin-bottom: .6rem;
    color: var(--color-text-dark);
}
.expertise-desc {
    font-size: .9rem;
    color: #666;
    line-height: 1.6;
    flex: 1;
    margin-bottom: 1.2rem;
}
.expertise-link {
    font-size: .85rem;
    font-weight: 600;
    color: var(--color-primary);
    display: flex;
    align-items: center;
    gap: .4rem;
    transition: gap .2s;
}
.expertise-card:hover .expertise-link { gap: .75rem; }
@media (max-width: 1024px) { .expertise-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px)  { .expertise-grid { grid-template-columns: 1fr; } }

/* ── Why Choose Us ──────────────────────────── */
.why-section { padding: 5rem 0; }
.why-content {
    display: grid;
    grid-template-columns: 1fr 1.1fr;
    gap: 5rem;
    align-items: center;
}
.why-image img {
    width: 100%;
    border-radius: 12px;
    box-shadow: 0 20px 48px rgba(0,0,0,.12);
}
.why-subtitle {
    color: #666;
    font-size: 1.05rem;
    margin-bottom: 2rem;
    line-height: 1.7;
}
.why-features {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}
.why-feature-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}
.why-feature-icon {
    flex-shrink: 0;
    width: 36px;
    height: 36px;
    background: var(--color-primary-bg);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary);
    margin-top: .1rem;
}
.why-feature-title {
    font-size: .95rem;
    font-weight: 700;
    margin-bottom: .2rem;
    color: var(--color-text-dark);
}
.why-feature-desc {
    font-size: .88rem;
    color: #666;
    line-height: 1.55;
}
@media (max-width: 768px) {
    .why-content { grid-template-columns: 1fr; gap: 2.5rem; }
}

/* ── Testimonials ───────────────────────────── */
.testimonial-section {
    background: var(--color-bg-dark);
    padding: 5rem 0;
}
.testimonial-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}
.testimonial-card {
    background: rgba(255,255,255,.05);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 12px;
    padding: 2rem;
    backdrop-filter: blur(8px);
    transition: background .3s;
}
.testimonial-card:hover { background: rgba(255,255,255,.08); }
.testimonial-stars { color: var(--color-accent); font-size: 1.1rem; margin-bottom: 1rem; }
.testimonial-text {
    color: rgba(255,255,255,.82);
    font-size: .95rem;
    line-height: 1.7;
    font-style: italic;
    margin-bottom: 1.5rem;
}
.testimonial-author { display: flex; align-items: center; gap: .875rem; }
.testimonial-avatar {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: var(--color-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: .9rem;
    flex-shrink: 0;
}
.testimonial-name  { color: white; font-weight: 600; font-size: .9rem; }
.testimonial-role  { color: #888; font-size: .8rem; margin-top: .1rem; }
@media (max-width: 768px) { .testimonial-grid { grid-template-columns: 1fr; } }

/* ── Footer CTA ─────────────────────────────── */
.footer-cta-section { position: relative; overflow: hidden; }
.cta-inner { position: relative; z-index: 1; }
.cta-buttons { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }
.cta-btn-primary {
    background: var(--color-accent);
    color: var(--color-bg-dark);
    font-weight: 700;
    padding: 1rem 2.5rem;
}
.cta-btn-primary:hover { background: #c8d832; }
.cta-btn-outline {
    border: 2px solid rgba(255,255,255,.6);
    color: white;
    padding: 1rem 2.5rem;
}
.cta-btn-outline:hover {
    background: rgba(255,255,255,.12);
    border-color: white;
}

/* ── Gallery override (remove duplicate header rendered in gallery-root) ── */
.gallery-section > .container { padding-bottom: 0; }
</style>

@endsection
