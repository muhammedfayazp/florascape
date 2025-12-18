import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import HeroSlider from './components/HeroSlider';
import CostCalculator from './components/CostCalculator';
import Gallery from './components/Gallery';

const mountReact = () => {
    const rootElement = document.getElementById('hero-slider-root');
    if (rootElement) {
        const slidesAttr = rootElement.getAttribute('data-initial-slides');
        const slides = slidesAttr ? JSON.parse(slidesAttr) : [];

        const root = createRoot(rootElement);
        root.render(
            <React.StrictMode>
                <HeroSlider slides={slides} />
            </React.StrictMode>
        );
    }

    // Mount Cost Calculator
    const calcElement = document.getElementById('cost-calculator-root');
    if (calcElement) {
        const calcRoot = createRoot(calcElement);
        calcRoot.render(
            <React.StrictMode>
                <CostCalculator />
            </React.StrictMode>
        );
    }

    // Mount Gallery
    const galleryElement = document.getElementById('gallery-root');
    if (galleryElement) {
        const dataAttr = galleryElement.getAttribute('data-initial-data');
        const initialData = dataAttr ? JSON.parse(dataAttr) : null;

        const galleryRoot = createRoot(galleryElement);
        galleryRoot.render(
            <React.StrictMode>
                <Gallery initialData={initialData} />
            </React.StrictMode>
        );
    }
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mountReact);
} else {
    mountReact();
}
