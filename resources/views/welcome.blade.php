@extends('layouts.web')

@section('content')
    {{-- Hero Section (React) --}}
    {{-- Hero Section (React) --}}
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
    <div id="hero-slider-root" data-initial-slides='@json($heroSlidesData)'></div>

    {{-- About Us Section --}}
    @if(isset($sections['about_us']))
        <section class="about-section">
            <div class="container">
                <div class="about-content">
                    <div class="about-image">
                        @php
                            $aboutImage = $sections['about_us']->image;
                            $aboutImageUrl = $aboutImage && !Str::startsWith($aboutImage, 'http') ? \Illuminate\Support\Facades\Storage::url($aboutImage) : $aboutImage;
                        @endphp
                        <img loading="lazy"
                            src="{{ Storage::disk('s3')->url($section->image) }}"
                            {{-- src="{{ $aboutImageUrl ?? 'https://images.unsplash.com/photo-1593113646773-028c619d4c72?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" --}}
                            alt="{{ $sections['about_us']->title }}">
                    </div>
                    <div class="about-text">
                        <p class="about-label">{{ $sections['about_us']->subtitle ?? 'About Us' }}</p>
                        <h2 class="about-heading">{{ $sections['about_us']->title }}</h2>
                        @if($sections['about_us']->content)
                            @foreach($sections['about_us']->content as $item)
                                <p class="about-paragraph">
                                    {{ $item['description'] ?? '' }}
                                </p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Cost Calculator Section --}}
    @if(isset($sections['cost_calculator']))
        <section class="calculator-section">
            <div class="container">
                <div id="cost-calculator-root" data-title="{{ $sections['cost_calculator']->title }}"
                    data-subtitle="{{ $sections['cost_calculator']->subtitle }}"
                    data-content='@json($sections['cost_calculator']->content)'></div>
            </div>
        </section>
    @endif

    {{-- Services Section --}}
    @if(isset($sections['our_expertise']))
        <section class="section bg-off-white">
            <div class="container">
                <div class="text-center" style="margin-bottom: 4rem;">
                    <h2 class="text-primary">{{ $sections['our_expertise']->title }}</h2>
                    <p style="color: #666; max-width: 600px; margin: 0 auto;">{{ $sections['our_expertise']->subtitle }}</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @if($sections['our_expertise']->content)
                        @foreach($sections['our_expertise']->content as $item)
                            <div class="card">
                                <div style="font-size: 3rem; margin-bottom: 1rem;">{{ $item['icon'] ?? ($item['image'] ?? '✨') }}</div>
                                <h3>{{ $item['title'] ?? '' }}</h3>
                                <p style="color: #666; margin-bottom: 1.5rem;">{{ $item['description'] ?? '' }}</p>
                                <a href="{{ route('services') }}" class="text-primary" style="font-weight: 600;">Learn More →</a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Gallery Section --}}
    <section id="gallery" class="gallery-section">
        <div id="gallery-root" data-initial-data='@json($galleryCategoriesData)'></div>
    </section>

    {{-- Features / Why Choose Us --}}

    {{-- Features / Why Choose Us --}}
    @if(isset($sections['why_choose_us']))
        <section class="section">
            <div class="container grid md:grid-cols-2 gap-8 items-center">
                <div>
                    @php
                        $whyImage = $sections['why_choose_us']->image;
                        $whyImageUrl = $whyImage && !Str::startsWith($whyImage, 'http') ? \Illuminate\Support\Facades\Storage::url($whyImage) : $whyImage;
                    @endphp
                    <img loading="lazy"
                        src="{{ $whyImageUrl ?? 'https://images.unsplash.com/photo-1600596542815-e495d915993a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80' }}"
                        alt="{{ $sections['why_choose_us']->title }}"
                        style="border-radius: 8px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                </div>
                <div>
                    <h2 class="text-primary">{{ $sections['why_choose_us']->title }}</h2>
                    <p style="color: #666; margin-bottom: 2rem; font-size: 1.1rem;">
                        {{ $sections['why_choose_us']->subtitle }}
                    </p>

                    <div class="grid grid-cols-1 gap-4">
                        @if($sections['why_choose_us']->content)
                            @foreach($sections['why_choose_us']->content as $index => $item)
                                <div class="flex items-center gap-4">
                                    <div style="background: var(--color-off-white); padding: 1rem; border-radius: 50%;">
                                        @php
                                            $icons = ['✨', '⏱️', '🌱', '👷', '🎨', '🏗️'];
                                            $icon = $icons[$index % count($icons)];
                                        @endphp
                                        {{ $icon }}
                                    </div>
                                    <div>
                                        <h4 style="margin-bottom: 0.25rem;">{{ $item['title'] ?? '' }}</h4>
                                        <p style="font-size: 0.9rem; color: #666;">{{ $item['description'] ?? '' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Dynamic Footer CTA --}}
    @if(isset($sections['footer_cta']))
        <section class="section bg-primary text-center">
            <div class="container">
                <h2 style="color: white; margin-bottom: 1.5rem;">{{ $sections['footer_cta']->title }}</h2>
                <p style="color: rgba(255,255,255,0.9); margin-bottom: 2.5rem; font-size: 1.2rem;">
                    {{ $sections['footer_cta']->subtitle }}
                </p>
                @php
                    $btnText = $sections['footer_cta']->content[0]['description'] ?? 'Start Your Project';
                    $btnLink = $sections['footer_cta']->content[1]['description'] ?? route('contact');
                @endphp
                <a href="{{ $btnLink }}" class="btn btn-primary"
                    style="background-color: var(--color-accent); color: var(--color-bg-dark);">{{ $btnText }}</a>
            </div>
        </section>
    @endif
@endsection
