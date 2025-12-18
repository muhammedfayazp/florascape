@extends('layouts.web')

@section('title', 'Contact Us - Florascape')

@section('content')
    {{-- Contact Hero --}}
    @if(isset($sections['contact_hero']))
        <div class="bg-primary text-center" style="padding: 8rem 0 4rem; color: white;">
            <div class="container animate-fade-in">
                <h1>{{ $sections['contact_hero']->title }}</h1>
                <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">
                    {{ $sections['contact_hero']->subtitle }}
                </p>
            </div>
        </div>
    @endif

    <section class="section">
        <div class="container grid md:grid-cols-2 gap-8">
            {{-- Contact Info --}}
            @if(isset($sections['contact_info']))
                <div>
                    <h2 class="text-primary">{{ $sections['contact_info']->title }}</h2>
                    <p style="color: #666; margin-bottom: 2rem;">
                        {{ $sections['contact_info']->subtitle }}
                    </p>

                    <div class="flex flex-col gap-6">
                        @if($sections['contact_info']->content)
                            @foreach($sections['contact_info']->content as $item)
                                @php
                                    $icons = [
                                        'Address' => '📍',
                                        'Phone' => '📞',
                                        'Email' => '✉️',
                                        'Hours' => '⏰',
                                    ];
                                    $icon = $icons[$item['title']] ?? '✨';
                                @endphp
                                <div class="flex items-center gap-4">
                                    <div
                                        style="background: var(--color-off-white); padding: 1rem; border-radius: 50%; color: var(--color-primary);">
                                        {{ $icon }}
                                    </div>
                                    <div>
                                        <h4 style="margin-bottom: 0.25rem;">{{ $item['title'] ?? '' }}</h4>
                                        <p style="color: #666;">{!! nl2br(e($item['description'] ?? '')) !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif

            {{-- Contact Form --}}
            <div class="card">
                <h2 class="text-primary" style="margin-bottom: 1.5rem;">Send a Message</h2>

                @if(session('success'))
                    <div
                        style="background: var(--color-primary-bg); color: var(--color-teal); padding: 1rem; border-radius: 4px; margin-bottom: 1.5rem; border-left: 4px solid var(--color-primary);">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div
                        style="background: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 4px; margin-bottom: 1.5rem; border-left: 4px solid #ef4444;">
                        <ul style="margin: 0; padding-left: 1rem;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name"
                                    style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-family: var(--font-body);">
                            </div>
                            <div>
                                <label for="email"
                                    style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-family: var(--font-body);">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="phone" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Phone
                                    (Optional)</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-family: var(--font-body);">
                            </div>
                            <div>
                                <label for="subject"
                                    style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Subject
                                    (Optional)</label>
                                <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-family: var(--font-body);">
                            </div>
                        </div>
                        <div>
                            <label for="message"
                                style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Message</label>
                            <textarea id="message" name="message" rows="4" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-family: var(--font-body);">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"
                            style="width: 100%; border: none; background: var(--color-primary); color: white;">Send
                            Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Dynamic Map Section --}}
    @if(isset($sections['contact_map']))
        <section>
            @if(!empty($sections['contact_map']->subtitle))
                <iframe src="{{ $sections['contact_map']->subtitle }}" width="100%" height="450" style="border:0;"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            @else
                <div
                    style="width: 100%; height: 400px; background-color: #e0e0e0; display: flex; align-items: center; justify-content: center; color: #777;">
                    [Map URL not provided in admin panel]
                </div>
            @endif
        </section>
    @endif
@endsection