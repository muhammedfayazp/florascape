import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';

// Styles are largely handled by web.css global classes, but we can refine here if needed.
// For now, we reuse the .hero-swiper structure so CSS mostly applies properly.

const HeroSlider = () => {
    return (
        <Swiper
            modules={[Navigation, Pagination, Autoplay, EffectFade]}
            effect="fade"
            fadeEffect={{ crossFade: true }}
            speed={1000}
            loop={true}
            autoplay={{
                delay: 5000,
                disableOnInteraction: false,
            }}
            // We use custom nav buttons which we need to render inside our component structure
            // However, Swiper React standard implementation wraps slides. 
            // We can put controls OUTSIDE or use Swiper's slot mechanism if needed, 
            // but standard absolute positioning + class names works if the html structure is right.
            // Actually, for custom nav, referencing by class works if they are inside the container or if updated via ref.
            // Simplest way: use navigation={{ nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }} and render them.
            navigation={{
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }}
            pagination={{
                el: '.swiper-pagination',
                type: 'fraction',
            }}
            className="hero-swiper"
        >
            <SwiperSlide>
                <div className="slide-bg" style={{ backgroundImage: "url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')" }}></div>
                <div className="slide-content">
                    <h1 className="slide-title">Transform Your All Outdoors into a Luxury Oasis</h1>
                    <p className="slide-text">Premium Landscaping & Pool Solutions in the UAE | Residential & Commercial Projects</p>
                    <div className="slide-btn">
                        <a href="/contact" className="btn-green">Get A Quote</a>
                    </div>
                </div>
            </SwiperSlide>

            <SwiperSlide>
                <div className="slide-bg" style={{ backgroundImage: "url('https://images.unsplash.com/photo-1600607686527-6fb886090705?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')" }}></div>
                <div className="slide-content">
                    <h1 className="slide-title">Expert Craftsmanship for Every Scale</h1>
                    <p className="slide-text">From intricate garden designs to expansive commercial developments.</p>
                    <div className="slide-btn">
                        <a href="/services" className="btn-green">View Services</a>
                    </div>
                </div>
            </SwiperSlide>

            <SwiperSlide>
                <div className="slide-bg" style={{ backgroundImage: "url('https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')" }}></div>
                <div className="slide-content">
                    <h1 className="slide-title">Sustainable Beauty, Built to Last</h1>
                    <p className="slide-text">Eco-friendly irrigation and native plant selection for the UAE climate.</p>
                    <div className="slide-btn">
                        <a href="/contact" className="btn-green">Contact Us</a>
                    </div>
                </div>
            </SwiperSlide>

            {/* Controls Bar (Inside Swiper container so default class targeting works easily) */}
            <div className="controls-bar">
                <div className="swiper-pagination"></div>
                <div className="nav-controls">
                    <div className="swiper-nav-btn swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" className="w-6 h-6" style={{ width: '20px' }}>
                            <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </div>
                    <div className="swiper-nav-btn swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" className="w-6 h-6" style={{ width: '20px' }}>
                            <path strokeLinecap="round" strokeLinejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>
            </div>
        </Swiper>
    );
};

export default HeroSlider;
