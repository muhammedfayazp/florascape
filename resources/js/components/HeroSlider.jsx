import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';

const HeroSlider = ({ slides = [] }) => {
    const navigationPrevRef = React.useRef(null);
    const navigationNextRef = React.useRef(null);

    const defaultSlides = [
        {
            image: "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80",
            title: "Transform Your Outdoors into a Luxury Oasis",
            description: "Premium Landscaping & Pool Solutions in the UAE | Residential & Commercial Projects",
            link: "/contact",
            cta: "Get A Quote"
        },
        {
            image: "https://images.unsplash.com/photo-1600607686527-6fb886090705?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80",
            title: "Expert Craftsmanship for Every Scale",
            description: "From intricate garden designs to expansive commercial developments.",
            link: "/services",
            cta: "View Services"
        },
        {
            image: "https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80",
            title: "Sustainable Beauty, Built to Last",
            description: "Eco-friendly irrigation and native plant selection for the UAE climate.",
            link: "/contact",
            cta: "Contact Us"
        }
    ];

    const finalSlides = slides && slides.length > 0 ? slides : defaultSlides;

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
                    return `<span class="swiper-pagination-current">${current}</span> / <span class="swiper-pagination-total">${total}</span>`;
                }
            }}
            className="hero-swiper"
        >
            {finalSlides.map((slide, index) => {
                const imageUrl = slide.image;
                const ctaText = slide.cta_text || (slide.link && slide.link.includes('contact') ? 'Contact Us' : 'View Services') || 'Learn More';

                return (
                    <SwiperSlide key={index}>
                        <div className="slide-bg" style={{ backgroundImage: `url('${imageUrl}')` }}></div>
                        <div className="slide-content">
                            {slide.title && <h1 className="slide-title">{slide.title}</h1>}
                            {slide.description && <p className="slide-text">{slide.description}</p>}
                            {slide.link && (
                                <div className="slide-btn">
                                    <a href={slide.link} className="btn-green">{ctaText}</a>
                                </div>
                            )}
                        </div>
                    </SwiperSlide>
                );
            })}

            {/* Controls Bar */}
            <div className="controls-bar">
                <div className="swiper-pagination"></div>
                <div className="nav-controls">
                    <div ref={navigationPrevRef} className="swiper-nav-btn swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" style={{ width: '28px', height: '28px' }}>
                            <path strokeLinecap="round" strokeLinejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                        </svg>
                    </div>
                    <div ref={navigationNextRef} className="swiper-nav-btn swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" style={{ width: '28px', height: '28px' }}>
                            <path strokeLinecap="round" strokeLinejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </div>
                </div>
            </div>
        </Swiper>
    );
};

export default HeroSlider;
