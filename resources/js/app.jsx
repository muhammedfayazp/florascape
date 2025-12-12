import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import HeroSlider from './components/HeroSlider';
import CostCalculator from './components/CostCalculator';
import Gallery from './components/Gallery';

const mountReact = () => {
    const rootElement = document.getElementById('hero-slider-root');

    if (rootElement) {
        const root = createRoot(rootElement);
        root.render(
            <React.StrictMode>
                <HeroSlider />
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
        const galleryRoot = createRoot(galleryElement);
        galleryRoot.render(
            <React.StrictMode>
                <Gallery />
            </React.StrictMode>
        );
    }
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mountReact);
} else {
    mountReact();
}
