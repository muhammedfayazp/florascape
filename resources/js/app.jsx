import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import HeroSlider from './components/HeroSlider';

const mountReact = () => {
    const rootElement = document.getElementById('hero-slider-root');

    if (rootElement) {
        console.log('Found #hero-slider-root, mounting React component...');
        const root = createRoot(rootElement);
        root.render(
            <React.StrictMode>
                <HeroSlider />
            </React.StrictMode>
        );
    } else {
        console.error('ERROR: #hero-slider-root not found in DOM! (Check if script is running before DOM load)');
    }
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mountReact);
} else {
    mountReact();
}
