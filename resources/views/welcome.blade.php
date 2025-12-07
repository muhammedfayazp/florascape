@extends('layouts.web')

@section('content')
    {{-- Hero Section --}}
    <section class="hero-section"
        style="position: relative; height: 100vh; display: flex; align-items: center; overflow: hidden;">
        {{-- Background Image Placeholder - using a gradient for now, normally would be an image --}}
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1558905540-212847de5fd6?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80') center/cover; opacity: 1;">
        </div>

        <div class="container animate-fade-in" style="color: white; text-align: center;">
            <h1 style="font-size: 4rem; margin-bottom: 1.5rem; text-shadow: 0 4px 10px rgba(0,0,0,0.3);">Elevate Your
                Outdoor Living</h1>
            <p style="font-size: 1.25rem; margin-bottom: 2.5rem; max-width: 700px; margin-left: auto; margin-right: auto;">
                Award-winning landscaping services blending nature's beauty with architectural precision.
            </p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('contact') }}" class="btn btn-primary"
                    style="background-color: var(--color-accent); color: var(--color-bg-dark);">Get a Consultation</a>
                <a href="{{ route('services') }}" class="btn btn-outline" style="border-color: white; color: white;">View
                    Our Work</a>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="section bg-off-white">
        <div class="container">
            <div class="text-center" style="margin-bottom: 4rem;">
                <h2 class="text-primary">Our Expertise</h2>
                <p style="color: #666; max-width: 600px; margin: 0 auto;">Comprehensive landscape solutions tailored to your
                    lifestyle and property.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🌿</div>
                    <h3>Landscape Design</h3>
                    <p style="color: #666; margin-bottom: 1.5rem;">Custom 3D designs that visualize your perfect outdoor
                        sanctuary before we break ground.</p>
                    <a href="{{ route('services') }}" class="text-primary" style="font-weight: 600;">Learn More →</a>
                </div>
                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🧱</div>
                    <h3>Hardscaping</h3>
                    <p style="color: #666; margin-bottom: 1.5rem;">Patios, walkways, retaining walls, and outdoor kitchens
                        built to last generations.</p>
                    <a href="{{ route('services') }}" class="text-primary" style="font-weight: 600;">Learn More →</a>
                </div>
                <div class="card">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">✂️</div>
                    <h3>Maintenance</h3>
                    <p style="color: #666; margin-bottom: 1.5rem;">Professional care to keep your landscape vibrant,
                        healthy, and pristine year-round.</p>
                    <a href="{{ route('services') }}" class="text-primary" style="font-weight: 600;">Learn More →</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Features / Why Choose Us --}}
    <section class="section">
        <div class="container grid md:grid-cols-2 gap-8 items-center">
            <div>
                <img src="https://images.unsplash.com/photo-1600596542815-e495d915993a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                    alt="Beautiful Garden" style="border-radius: 8px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
            </div>
            <div>
                <h2 class="text-primary">Why Florascape?</h2>
                <p style="color: #666; margin-bottom: 2rem; font-size: 1.1rem;">
                    We believe your outdoor space should be an extension of your home—a place to relax, entertain, and
                    connect with nature.
                </p>

                <div class="grid grid-cols-1 gap-4">
                    <div class="flex items-center gap-4">
                        <div style="background: var(--color-off-white); padding: 1rem; border-radius: 50%;">🏆</div>
                        <div>
                            <h4 style="margin-bottom: 0.25rem;">Award Winning Design</h4>
                            <p style="font-size: 0.9rem; color: #666;">Recognized excellence in landscape architecture.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div style="background: var(--color-off-white); padding: 1rem; border-radius: 50%;">🌱</div>
                        <div>
                            <h4 style="margin-bottom: 0.25rem;">Eco-Friendly Practices</h4>
                            <p style="font-size: 0.9rem; color: #666;">Sustainable materials and native plant selection.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div style="background: var(--color-off-white); padding: 1rem; border-radius: 50%;">👷</div>
                        <div>
                            <h4 style="margin-bottom: 0.25rem;">Expert Craftsmanship</h4>
                            <p style="font-size: 0.9rem; color: #666;">Skilled team with decades of combined experience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="section bg-primary text-center">
        <div class="container">
            <h2 style="color: white; margin-bottom: 1.5rem;">Ready to Transform Your Space?</h2>
            <p style="color: rgba(255,255,255,0.9); margin-bottom: 2.5rem; font-size: 1.2rem;">Schedule a free consultation
                with our design team today.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary"
                style="background-color: var(--color-accent); color: var(--color-bg-dark);">Start Your Project</a>
        </div>
    </section>
@endsection