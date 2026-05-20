@extends('layouts.web')

@section('content')
    {{-- Portfolio Hero --}}
    @if(isset($sections['portfolio_hero']))
        <section class="section bg-dark text-center" style="padding: 8rem 0 4rem;">
            <div class="container">
                <p class="text-accent animate-fade-in"
                    style="text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1rem;">Our Legacy</p>
                <h1 style="color: white; margin-bottom: 1.5rem;" class="animate-fade-in">
                    {{ $sections['portfolio_hero']->title }}
                </h1>
                <p style="color: rgba(255,255,255,0.7); max-width: 700px; margin: 0 auto;" class="animate-fade-in">
                    {{ $sections['portfolio_hero']->subtitle }}
                </p>
            </div>
        </section>
    @endif

    {{-- Portfolio Grid --}}
    <section class="section bg-off-white">
        <div class="container">
            @foreach($categories as $category)
                @if($category->projects->count() > 0)
                    <div style="margin-bottom: 6rem;">
                        <div class="flex items-center gap-4" style="margin-bottom: 2.5rem;">
                            <h2 class="text-primary" style="margin-bottom: 0;">{{ $category->name }}</h2>
                            <div style="flex: 1; height: 2px; background: var(--color-primary-bg);"></div>
                        </div>

                        <div class="grid md:grid-cols-3 gap-8">
                            @foreach($category->projects as $project)
                                @php
                                    $imageUrl = image_url($project->image);
                                @endphp
                                <div class="portfolio-card">
                                    <div class="portfolio-image">
                                        <img loading="lazy" src="{{ $imageUrl }}" alt="{{ $project->title }}">
                                        <div class="portfolio-overlay">
                                            <div class="portfolio-info">
                                                <h4>{{ $project->title }}</h4>
                                                <p>{{ Str::limit($project->description, 60) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

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

    <style>
        .portfolio-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .portfolio-card:hover {
            transform: translateY(-10px);
        }

        .portfolio-image {
            position: relative;
            aspect-ratio: 4/3;
            overflow: hidden;
        }

        .portfolio-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .portfolio-card:hover .portfolio-image img {
            transform: scale(1.1);
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, transparent 60%);
            display: flex;
            align-items: flex-end;
            padding: 2rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .portfolio-card:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-info {
            color: white;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .portfolio-card:hover .portfolio-info {
            transform: translateY(0);
        }

        .portfolio-info h4 {
            margin-bottom: 0.5rem;
            color: white;
            font-size: 1.25rem;
        }

        .portfolio-info p {
            font-size: 0.9rem;
            opacity: 0.8;
            line-height: 1.4;
        }
    </style>
@endsection
