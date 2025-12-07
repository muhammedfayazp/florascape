@extends('layouts.web')

@section('title', 'Contact Us - Florascape')

@section('content')
    <div class="bg-primary text-center" style="padding: 8rem 0 4rem; color: white;">
        <div class="container animate-fade-in">
            <h1>Get In Touch</h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">We'd love to hear about your
                project. Fill out the form below or give us a call.</p>
        </div>
    </div>

    <section class="section">
        <div class="container grid md:grid-cols-2 gap-8">
            {{-- Contact Info --}}
            <div>
                <h2 class="text-primary">Contact Information</h2>
                <p style="color: #666; margin-bottom: 2rem;">
                    Reach out to us for consultations, quotes, or any questions you might have.
                </p>

                <div class="flex flex-col gap-6">
                    <div class="flex items-center gap-4">
                        <div
                            style="background: var(--color-off-white); padding: 1rem; border-radius: 50%; color: var(--color-primary);">
                            📍</div>
                        <div>
                            <h4 style="margin-bottom: 0.25rem;">Address</h4>
                            <p style="color: #666;">123 Green Valley Way, Springfield, ST 12345</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div
                            style="background: var(--color-off-white); padding: 1rem; border-radius: 50%; color: var(--color-primary);">
                            📞</div>
                        <div>
                            <h4 style="margin-bottom: 0.25rem;">Phone</h4>
                            <p style="color: #666;">(555) 123-4567</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div
                            style="background: var(--color-off-white); padding: 1rem; border-radius: 50%; color: var(--color-primary);">
                            ✉️</div>
                        <div>
                            <h4 style="margin-bottom: 0.25rem;">Email</h4>
                            <p style="color: #666;">hello@florascape.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div
                            style="background: var(--color-off-white); padding: 1rem; border-radius: 50%; color: var(--color-primary);">
                            ⏰</div>
                        <div>
                            <h4 style="margin-bottom: 0.25rem;">Hours</h4>
                            <p style="color: #666;">Mon-Fri: 8am - 6pm<br>Sat: 9am - 4pm<br>Sun: Closed</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="card">
                <h2 class="text-primary" style="margin-bottom: 1.5rem;">Send a Message</h2>
                <form action="#" method="POST"
                    onsubmit="event.preventDefault(); alert('Thanks for reaching out! This is a demo form.');">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div>
                            <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Name</label>
                            <input type="text" id="name" name="name" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-family: var(--font-body);">
                        </div>
                        <div>
                            <label for="email"
                                style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Email</label>
                            <input type="email" id="email" name="email" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-family: var(--font-body);">
                        </div>
                        <div>
                            <label for="phone" style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Phone
                                (Optional)</label>
                            <input type="tel" id="phone" name="phone"
                                style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-family: var(--font-body);">
                        </div>
                        <div>
                            <label for="message"
                                style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Message</label>
                            <textarea id="message" name="message" rows="4" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; font-family: var(--font-body);"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%; border: none;">Send
                            Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Map Placeholder --}}
    <section>
        <div
            style="width: 100%; height: 400px; background-color: #e0e0e0; display: flex; align-items: center; justify-content: center; color: #777;">
            [Map Embedding Would Go Here]
        </div>
    </section>
@endsection