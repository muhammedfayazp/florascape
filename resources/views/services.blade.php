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
                {{-- Swimming Pool & Water Features --}}
                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🏊</div>
                    <h3>Swimming Pool & Water Feature Design and Construction</h3>
                    <p style="color: #666; margin-bottom: 1.5rem;">Custom swimming pools, decorative fountains, ponds, and
                        water features designed to enhance your outdoor living experience.</p>
                    <ul style="list-style: none; color: #444; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ Custom pool design and construction</li>
                        <li style="margin-bottom: 0.5rem;">✓ Water fountains and decorative features</li>
                        <li style="margin-bottom: 0.5rem;">✓ Pond and lake installation</li>
                        <li style="margin-bottom: 0.5rem;">✓ Waterfall integration</li>
                    </ul>
                </div>

                {{-- Pool & Water Feature Maintenance --}}
                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">💦</div>
                    <h3>Swimming Pool & Water Feature Care and Maintenance</h3>
                    <p style="color: #666; margin-bottom: 1.5rem;">Professional cleaning, chemical balancing, and
                        maintenance to keep your water features pristine year-round.</p>
                    <ul style="list-style: none; color: #444; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ Regular pool cleaning and servicing</li>
                        <li style="margin-bottom: 0.5rem;">✓ Chemical balance management</li>
                        <li style="margin-bottom: 0.5rem;">✓ Equipment inspection and repair</li>
                        <li style="margin-bottom: 0.5rem;">✓ Pond and fountain maintenance</li>
                    </ul>
                </div>

                {{-- Automatic Irrigation --}}
                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">💧</div>
                    <h3>Automatic Irrigation System</h3>
                    <p style="color: #666; margin-bottom: 1.5rem;">Smart irrigation solutions designed for water efficiency
                        and optimal plant health in UAE's climate.</p>
                    <ul style="list-style: none; color: #444; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ Custom irrigation design and installation</li>
                        <li style="margin-bottom: 0.5rem;">✓ Smart controller integration</li>
                        <li style="margin-bottom: 0.5rem;">✓ Drip and sprinkler systems</li>
                        <li style="margin-bottom: 0.5rem;">✓ Water conservation solutions</li>
                    </ul>
                </div>

                {{-- Indoor Garden --}}
                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🪴</div>
                    <h3>Indoor Garden Installation, Care & Maintenance</h3>
                    <p style="color: #666; margin-bottom: 1.5rem;">Transform interior spaces with lush greenery, from living
                        walls to potted plant arrangements.</p>
                    <ul style="list-style: none; color: #444; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ Indoor plant selection and installation</li>
                        <li style="margin-bottom: 0.5rem;">✓ Living wall design and construction</li>
                        <li style="margin-bottom: 0.5rem;">✓ Regular maintenance and care</li>
                        <li style="margin-bottom: 0.5rem;">✓ Plant health monitoring</li>
                    </ul>
                </div>

                {{-- Outdoor Garden Maintenance --}}
                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🌳</div>
                    <h3>Outdoor Garden Care & Maintenance</h3>
                    <p style="color: #666; margin-bottom: 1.5rem;">Comprehensive outdoor maintenance services to keep your
                        landscape healthy, vibrant, and beautiful.</p>
                    <ul style="list-style: none; color: #444; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ Lawn mowing and edging</li>
                        <li style="margin-bottom: 0.5rem;">✓ Pruning and trimming</li>
                        <li style="margin-bottom: 0.5rem;">✓ Fertilization and pest control</li>
                        <li style="margin-bottom: 0.5rem;">✓ Seasonal plantings and cleanups</li>
                    </ul>
                </div>

                {{-- Hardscaping --}}
                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🧱</div>
                    <h3>Hardscaping</h3>
                    <p style="color: #666; margin-bottom: 1.5rem;">Durable and beautiful hardscape elements that define and
                        enhance your outdoor living spaces.</p>
                    <ul style="list-style: none; color: #444; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ Tile work and paving</li>
                        <li style="margin-bottom: 0.5rem;">✓ Rockery gardens and paths</li>
                        <li style="margin-bottom: 0.5rem;">✓ Wood composite & timber decks</li>
                        <li style="margin-bottom: 0.5rem;">✓ Walls, fences, and trellis</li>
                        <li style="margin-bottom: 0.5rem;">✓ Stepping stones and gravel work</li>
                        <li style="margin-bottom: 0.5rem;">✓ Outdoor structures and playgrounds</li>
                    </ul>
                </div>
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
                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🌱</div>
                    <h4>Artificial Grass and Plants Installation</h4>
                    <p style="color: #666;">Low-maintenance, year-round green solutions perfect for UAE's climate</p>
                </div>

                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🎨</div>
                    <h4>Composite Works</h4>
                    <p style="color: #666;">Children's play equipment, artificial rock work, landscape lighting, pergolas &
                        gazebos, shade structures, timber bridges and decking</p>
                </div>

                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🏗️</div>
                    <h4>Custom Landscape Features</h4>
                    <p style="color: #666;">Bespoke outdoor elements tailored to your vision and property requirements</p>
                </div>
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