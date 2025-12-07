@extends('layouts.web')

@section('content')
    {{-- Hero Section (React) --}}
    <div id="hero-slider-root"></div>

    {{-- About Us Section --}}
    <section class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1593113646773-028c619d4c72?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Florascape Landscaping Professional at Work">
                </div>
                <div class="about-text">
                    <p class="about-label">About Us</p>
                    <h2 class="about-heading">Creating Outdoor Masterpieces Across the UAE</h2>
                    <p class="about-paragraph">
                        We FLORASCAPE LANDSCAPE LLC, is a dynamic and creative landscaping startup leading by experienced
                        professionals dedicated to transforming outdoor spaces into breathtaking and functional
                        environments.
                    </p>
                    <p class="about-paragraph">
                        Founded on the principles of creativity, sustainability, and professionalism, we specialize in
                        providing comprehensive landscaping services tailored to meet the unique needs and preferences of
                        our clients. With a passionate team of experts and a commitment to excellence, we aim to set new
                        standards of quality and reliability in the landscaping industry.
                    </p>
                    <p class="about-paragraph">
                        Our mission is to enrich lives and enhance communities by creating stunning outdoor landscapes that
                        inspire and delight. We strive to exceed our clients' expectations through unparalleled
                        craftsmanship, attention to detail, and environmentally conscious practices.
                    </p>
                </div>
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