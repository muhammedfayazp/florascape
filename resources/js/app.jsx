import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import HeroSlider from './components/HeroSlider';
import CostCalculator from './components/CostCalculator';

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
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mountReact);
} else {
    mountReact();
}
