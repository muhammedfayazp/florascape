@extends('layouts.web')

@section('title', 'About Us - Florascape')

@section('content')
    <div class="bg-primary text-center" style="padding: 8rem 0 4rem; color: white;">
        <div class="container animate-fade-in">
            <h1>About Florascape</h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">Cultivating beauty and harmony in
                every outdoor space we touch.</p>
        </div>
    </div>

    <section class="section">
        <div class="container grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h2 class="text-primary">Our Story</h2>
                <p style="color: #666; margin-bottom: 1.5rem;">
                    Founded in 2010, Florascape began with a simple mission: to reconnect people with nature through
                    thoughtful landscape design. What started as a small two-person operation has grown into a premier
                    landscaping firm serving the greater metropolitan area.
                </p>
                <p style="color: #666; margin-bottom: 1.5rem;">
                    We believe that a garden is more than just plants; it's a living ecosystem that enhances your quality of
                    life. Our approach combines horticultural expertise with artistic vision to create sustainable,
                    resilient, and breathtaking outdoor environments.
                </p>
                <div style="border-left: 4px solid var(--color-accent); padding-left: 1.5rem; margin-top: 2rem;">
                    <p style="font-style: italic; font-size: 1.1rem; color: #444;">
                        "We don't just plant gardens; we create sanctuaries where memories are grown."
                    </p>
                    <p style="margin-top: 0.5rem; font-weight: 600;">— Sarah Jenkins, Founder</p>
                </div>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                    alt="Our Team Working" style="border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            </div>
        </div>
    </section>

    <section class="section bg-off-white">
        <div class="container text-center">
            <h2 class="text-primary" style="margin-bottom: 3rem;">Our Values</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="card">
                    <h3 style="margin-bottom: 1rem;">Sustainability</h3>
                    <p style="color: #666;">We prioritize native plants, water-efficient irrigation, and organic fertilizers
                        to protect our local ecosystem.</p>
                </div>
                <div class="card">
                    <h3 style="margin-bottom: 1rem;">Quality</h3>
                    <p style="color: #666;">We source only the healthiest plants and highest-grade materials to ensure your
                        landscape stands the test of time.</p>
                </div>
                <div class="card">
                    <h3 style="margin-bottom: 1rem;">Integrity</h3>
                    <p style="color: #666;">Honest communication, transparent pricing, and a commitment to doing what we say
                        we'll do.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container text-center">
            <h2 class="text-primary" style="margin-bottom: 3rem;">Meet The Team</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=600&q=80"
                        alt="Sarah Jenkins"
                        style="border-radius: 50%; width: 200px; height: 200px; object-fit: cover; margin: 0 auto 1.5rem;">
                    <h3>Sarah Jenkins</h3>
                    <p style="color: var(--color-accent); font-weight: 500; margin-bottom: 0.5rem;">Founder & Lead Designer
                    </p>
                    <p style="color: #666; font-size: 0.9rem;">20+ years of landscape architecture experience.</p>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=600&q=80"
                        alt="Michael Chen"
                        style="border-radius: 50%; width: 200px; height: 200px; object-fit: cover; margin: 0 auto 1.5rem;">
                    <h3>Michael Chen</h3>
                    <p style="color: var(--color-accent); font-weight: 500; margin-bottom: 0.5rem;">Operations Manager</p>
                    <p style="color: #666; font-size: 0.9rem;">Ensures every project runs smoothly and on time.</p>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=600&q=80"
                        alt="Emma Rodriguez"
                        style="border-radius: 50%; width: 200px; height: 200px; object-fit: cover; margin: 0 auto 1.5rem;">
                    <h3>Emma Rodriguez</h3>
                    <p style="color: var(--color-accent); font-weight: 500; margin-bottom: 0.5rem;">Head Horticulturist</p>
                    <p style="color: #666; font-size: 0.9rem;">Expert in native flora and plant health.</p>
                </div>
            </div>
        </div>
    </section>
@endsection