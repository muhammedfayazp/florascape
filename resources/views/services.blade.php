@extends('layouts.web')

@section('title', 'Our Services - Professional Landscaping Services in UAE | Florascape')

@section('content')
    {{-- Hero Section --}}
    <div class="bg-primary text-center" style="padding: 8rem 0 4rem; color: white;">
        <div class="container animate-fade-in">
            <p
                style="font-size: 0.95rem; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 1rem; opacity: 0.9;">
                Services Provided</p>
            <h1 style="font-size: 3.5rem; margin-bottom: 1.5rem;">Design. Build. Maintain.</h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 700px; margin: 0 auto;">
                Comprehensive landscaping solutions from pool construction to garden maintenance
            </p>
        </div>
    </div>

    {{-- Main Services Grid --}}
    <section class="section">
        <div class="container">
            <div class="text-center" style="margin-bottom: 4rem;">
                <h2 class="text-primary">Our Complete Service Portfolio</h2>
                <p style="color: #666; max-width: 700px; margin: 1rem auto 0;">
                    From design to installation to ongoing maintenance, we provide complete landscaping solutions
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($services->where('type', 'main') as $service)
                    <div class="card">
                        @if($service->icon)
                            <div style="font-size: 3rem; margin-bottom: 1rem;">{{ $service->icon }}</div>
                        @endif
                        <h3>{{ $service->title }}</h3>
                        <p style="color: #666; margin-bottom: 1.5rem;">{{ $service->description }}</p>
                        @if($service->features && is_array($service->features))
                            <ul style="list-style: none; color: #444; margin-bottom: 2rem;">
                                @foreach($service->features as $featureItem)
                                    {{-- Handle repeater structure depending on how it saves --}}
                                    @php $featureText = is_array($featureItem) ? ($featureItem['feature'] ?? reset($featureItem)) : $featureItem; @endphp
                                    <li style="margin-bottom: 0.5rem;">✓ {{ $featureText }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Specialized Services --}}
    <section class="section bg-off-white">
        <div class="container">
            <div class="text-center" style="margin-bottom: 4rem;">
                <h2 class="text-primary">Specialized Services</h2>
                <p style="color: #666; max-width: 700px; margin: 1rem auto 0;">
                    Expert solutions for unique landscaping needs
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                @foreach($services->where('type', 'specialized') as $service)
                    <div class="card">
                        @if($service->icon)
                            <div style="font-size: 3rem; margin-bottom: 1rem;">{{ $service->icon }}</div>
                        @endif
                        <h4>{{ $service->title }}</h4>
                        <p style="color: #666;">{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="section bg-primary text-center">
        <div class="container">
            <h2 style="color: white; margin-bottom: 1.5rem;">Ready to Transform Your Outdoor Space?</h2>
            <p
                style="color: rgba(255,255,255,0.9); margin-bottom: 2.5rem; font-size: 1.2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                Contact us today for a free consultation and discover how we can bring your landscaping vision to life.
            </p>
            <a href="{{ route('contact') }}" class="btn btn-primary"
                style="background-color: var(--color-accent); color: var(--color-bg-dark); font-size: 1.1rem; padding: 1.2rem 3rem;">
                Get Free Consultation
            </a>
        </div>
    </section>
@endsection