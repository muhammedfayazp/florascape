import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import HeroSlider from './components/HeroSlider';

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
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mountReact);
} else {
    mountReact();
}
