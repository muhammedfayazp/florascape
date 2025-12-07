@extends('layouts.web')

@section('title', 'Our Services - Florascape')

@section('content')
    <div class="bg-primary text-center" style="padding: 8rem 0 4rem; color: white;">
        <div class="container animate-fade-in">
            <h1>Our Services</h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">Comprehensive landscaping
                solutions designed to enhance the beauty and value of your property.</p>
        </div>
    </div>

    <section class="section">
        <div class="container">
            {{-- Service Category 1 --}}
            <div class="grid md:grid-cols-2 gap-8 items-center" style="margin-bottom: 6rem;">
                <div>
                    <img src="https://images.unsplash.com/photo-1598902168918-638f85697669?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                        alt="Landscape Design" style="border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                </div>
                <div>
                    <h2 class="text-primary">Landscape Design & Architecture</h2>
                    <p style="color: #666; margin-bottom: 1.5rem;">
                        Our design process begins with a vision. We work closely with you to understand your lifestyle,
                        preferences, and the unique characteristics of your property.
                    </p>
                    <ul style="list-style: none; color: #444; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ 3D Visualization & Rendering</li>
                        <li style="margin-bottom: 0.5rem;">✓ Master Planning</li>
                        <li style="margin-bottom: 0.5rem;">✓ Site Analysis & Consultation</li>
                        <li style="margin-bottom: 0.5rem;">✓ Planting Plans</li>
                    </ul>
                </div>
            </div>

            {{-- Service Category 2 --}}
            <div class="grid md:grid-cols-2 gap-8 items-center" style="margin-bottom: 6rem;">
                <div style="order: 2;"> <!-- Image on right for desktop -->
                    <img src="https://images.unsplash.com/photo-1621257088926-d343b4694406?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                        alt="Hardscaping" style="border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                </div>
                <div style="order: 1;">
                    <h2 class="text-primary">Hardscaping & Construction</h2>
                    <p style="color: #666; margin-bottom: 1.5rem;">
                        Define your outdoor space with structural elegance. Our hardscaping services provide the foundation
                        for your outdoor living area.
                    </p>
                    <ul style="list-style: none; color: #444; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ Custom Patios & Walkways</li>
                        <li style="margin-bottom: 0.5rem;">✓ Retaining Walls</li>
                        <li style="margin-bottom: 0.5rem;">✓ Outdoor Kitchens & Fire Pits</li>
                        <li style="margin-bottom: 0.5rem;">✓ Pool Decks</li>
                    </ul>
                </div>
            </div>

            {{-- Service Category 3 --}}
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1557429287-b2e26467fc2b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                        alt="Maintenance" style="border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                </div>
                <div>
                    <h2 class="text-primary">Premium Maintenance</h2>
                    <p style="color: #666; margin-bottom: 1.5rem;">
                        Keep your landscape looking pristine year-round with our comprehensive maintenance packages.
                    </p>
                    <ul style="list-style: none; color: #444; margin-bottom: 2rem;">
                        <li style="margin-bottom: 0.5rem;">✓ Weekly Lawn Care</li>
                        <li style="margin-bottom: 0.5rem;">✓ Pruning & Trimming</li>
                        <li style="margin-bottom: 0.5rem;">✓ Seasonal Clean-ups</li>
                        <li style="margin-bottom: 0.5rem;">✓ Fertilization Programs</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section class="section bg-off-white text-center">
        <div class="container">
            <h2 class="text-primary">Detailed Pricing</h2>
            <p style="color: #666; max-width: 600px; margin: 0 auto 3rem;">Transparent pricing for our most popular service
                packages.</p>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="card">
                    <h3 class="text-primary">Essential</h3>
                    <p style="font-size: 2rem; font-weight: 700; margin: 1rem 0;">$299<span
                            style="font-size: 1rem; font-weight: 400; color: #999;">/mo</span></p>
                    <p style="color: #666; margin-bottom: 1.5rem;">Perfect for maintaining a tidy lawn.</p>
                    <ul style="text-align: left; margin-bottom: 2rem; color: #444;">
                        <li style="margin-bottom: 0.5rem;">✓ Weekly Mowing</li>
                        <li style="margin-bottom: 0.5rem;">✓ Edging & Blowing</li>
                        <li style="margin-bottom: 0.5rem;">✓ Spring/Fall Cleanup</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="btn btn-outline"
                        style="border-color: var(--color-primary); color: var(--color-primary); width: 100%;">Choose
                        Plan</a>
                </div>
                <div class="card" style="border: 2px solid var(--color-accent); transform: scale(1.05);">
                    <div
                        style="background: var(--color-accent); color: white; padding: 0.25rem; font-size: 0.8rem; font-weight: 700; border-radius: 4px; display: inline-block; margin-bottom: 0.5rem;">
                        POPULAR</div>
                    <h3 class="text-primary">Premium</h3>
                    <p style="font-size: 2rem; font-weight: 700; margin: 1rem 0;">$499<span
                            style="font-size: 1rem; font-weight: 400; color: #999;">/mo</span></p>
                    <p style="color: #666; margin-bottom: 1.5rem;">Comprehensive care for your garden.</p>
                    <ul style="text-align: left; margin-bottom: 2rem; color: #444;">
                        <li style="margin-bottom: 0.5rem;">✓ All Essential Features</li>
                        <li style="margin-bottom: 0.5rem;">✓ Shrub Pruning</li>
                        <li style="margin-bottom: 0.5rem;">✓ Fertilization</li>
                        <li style="margin-bottom: 0.5rem;">✓ Weed Control</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="btn btn-primary" style="width: 100%;">Choose Plan</a>
                </div>
                <div class="card">
                    <h3 class="text-primary">Estate</h3>
                    <p style="font-size: 2rem; font-weight: 700; margin: 1rem 0;">Call Us</p>
                    <p style="color: #666; margin-bottom: 1.5rem;">Tailored solutions for large properties.</p>
                    <ul style="text-align: left; margin-bottom: 2rem; color: #444;">
                        <li style="margin-bottom: 0.5rem;">✓ All Premium Features</li>
                        <li style="margin-bottom: 0.5rem;">✓ Irrigation Maintenance</li>
                        <li style="margin-bottom: 0.5rem;">✓ Seasonal Plantings</li>
                        <li style="margin-bottom: 0.5rem;">✓ Priority Scheduling</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="btn btn-outline"
                        style="border-color: var(--color-primary); color: var(--color-primary); width: 100%;">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
@endsection