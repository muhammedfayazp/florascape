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
    const navigationPrevRef = React.useRef(null);
    const navigationNextRef = React.useRef(null);

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
            onBeforeInit={(swiper) => {
                swiper.params.navigation.prevEl = navigationPrevRef.current;
                swiper.params.navigation.nextEl = navigationNextRef.current;
            }}
            navigation={{
                prevEl: navigationPrevRef.current,
                nextEl: navigationNextRef.current,
            }}
            pagination={{
                el: '.swiper-pagination',
                type: 'custom',
                renderCustom: function (swiper, current, total) {
                    // Adding a key to the current number span forces a re-render/animation restart
                    return `<span class="swiper-pagination-current" key="${current}">${current}</span> / <span class="swiper-pagination-total">${total}</span>`;
                }
            }}
            className="hero-swiper"
        >
            <SwiperSlide>
                <div className="slide-bg" style={{ backgroundImage: "url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')" }}></div>
                <div className="slide-content">
                    <h1 className="slide-title">Transform Your Outdoors into a Luxury Oasis</h1>
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

            {/* Controls Bar */}
            <div className="controls-bar">
                <div className="swiper-pagination"></div>
                <div className="nav-controls">
                    <div ref={navigationPrevRef} className="swiper-nav-btn swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="w-6 h-6" style={{ width: '28px' }}>
                            <path strokeLinecap="round" strokeLinejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                        </svg>
                    </div>
                    <div ref={navigationNextRef} className="swiper-nav-btn swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="w-6 h-6" style={{ width: '28px' }}>
                            <path strokeLinecap="round" strokeLinejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </div>
                </div>
            </div>
        </Swiper>
    );
};

export default HeroSlider;
