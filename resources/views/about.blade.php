@extends('layouts.web')

@section('title', 'About Us - Florascape')

@section('content')
    {{-- About Hero --}}
    @if(isset($sections['about_hero']))
        <div class="bg-primary text-center" style="padding: 8rem 0 4rem; color: white;">
            <div class="container animate-fade-in">
                <h1>{{ $sections['about_hero']->title }}</h1>
                <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">
                    {{ $sections['about_hero']->subtitle }}</p>
            </div>
        </div>
    @endif

    {{-- Our Story --}}
    @if(isset($sections['about_story']))
        <section class="section">
            <div class="container grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-primary">{{ $sections['about_story']->title }}</h2>
                    @if($sections['about_story']->content)
                        @foreach($sections['about_story']->content as $item)
                            <p style="color: #666; margin-bottom: 1.5rem;">
                                {{ $item['description'] ?? '' }}
                            </p>
                        @endforeach
                    @endif
                    <div style="border-left: 4px solid var(--color-accent); padding-left: 1.5rem; margin-top: 2rem;">
                        <p style="font-style: italic; font-size: 1.1rem; color: #444;">
                            {{ $sections['about_story']->subtitle }}
                        </p>
                    </div>
                </div>
                <div>
                    @php
                        $storyImage = $sections['about_story']->image;
                        $storyImageUrl = $storyImage && !Str::startsWith($storyImage, 'http') ? asset('storage/' . $storyImage) : $storyImage;
                    @endphp
                    <img loading="lazy"
                        src="{{ $storyImageUrl ?? 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80' }}"
                        alt="{{ $sections['about_story']->title }}"
                        style="border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                </div>
            </div>
        </section>
    @endif

    {{-- Our Values --}}
    @if(isset($sections['about_values']))
        <section class="section bg-off-white">
            <div class="container text-center">
                <h2 class="text-primary" style="margin-bottom: 3rem;">{{ $sections['about_values']->title }}</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @if($sections['about_values']->content)
                        @foreach($sections['about_values']->content as $item)
                            <div class="card">
                                <h3 style="margin-bottom: 1rem;">{{ $item['title'] ?? '' }}</h3>
                                <p style="color: #666;">{{ $item['description'] ?? '' }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Meet The Team --}}
    @if(isset($sections['about_team']))
        <section class="section">
            <div class="container text-center">
                <h2 class="text-primary" style="margin-bottom: 3rem;">{{ $sections['about_team']->title }}</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @if($sections['about_team']->content)
                        @foreach($sections['about_team']->content as $item)
                            @php
                                $memberImage = $item['image'] ?? null;
                                $memberImageUrl = $memberImage && !Str::startsWith($memberImage, 'http') ? asset('storage/' . $memberImage) : ($memberImage ?? 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=600&q=80');
                            @endphp
                            <div>
                                <img loading="lazy" src="{{ $memberImageUrl }}" alt="{{ $item['title'] ?? 'Team Member' }}"
                                    style="border-radius: 50%; width: 200px; height: 200px; object-fit: cover; margin: 0 auto 1.5rem;">
                                <h3>{{ $item['title'] ?? '' }}</h3>
                                @php
                                    // Assuming description format like "Role. Bio" or just bio
                                    $parts = explode('.', $item['description'] ?? '', 2);
                                    $role = trim($parts[0]);
                                    $bio = trim($parts[1] ?? '');
                                @endphp
                                <p style="color: var(--color-accent); font-weight: 500; margin-bottom: 0.5rem;">{{ $role }}</p>
                                <p style="color: #666; font-size: 0.9rem;">{{ $bio }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif
@endsection