import React, { useState } from 'react';

const CostCalculator = () => {
    const [step, setStep] = useState(1);
    const [formData, setFormData] = useState({
        propertyType: '',
        services: [],
        squareFeet: '',
        name: '',
        email: '',
        phone: ''
    });
    const [estimate, setEstimate] = useState(null);

    const services = [
        { id: 'landscape-design', name: 'Landscape Design', pricePerSqFt: 25 },
        { id: 'lawn-care', name: 'Lawn Care & Maintenance', pricePerSqFt: 8 },
        { id: 'hardscaping', name: 'Hardscaping (Patios, Walkways)', pricePerSqFt: 150 },
        { id: 'irrigation', name: 'Irrigation System', pricePerSqFt: 35 },
        { id: 'pool-landscaping', name: 'Pool Area Landscaping', pricePerSqFt: 200 },
        { id: 'garden-lighting', name: 'Garden Lighting', pricePerSqFt: 45 }
    ];

    const propertyTypes = [
        { id: 'villa', name: 'Villa', multiplier: 1.2 },
        { id: 'apartment', name: 'Apartment', multiplier: 0.8 },
        { id: 'townhouse', name: 'Townhouse', multiplier: 1.0 },
        { id: 'commercial', name: 'Commercial Property', multiplier: 1.5 }
    ];

    const handleServiceToggle = (serviceId) => {
        setFormData(prev => ({
            ...prev,
            services: prev.services.includes(serviceId)
                ? prev.services.filter(id => id !== serviceId)
                : [...prev.services, serviceId]
        }));
    };

    const calculateEstimate = () => {
        const sqFt = parseFloat(formData.squareFeet) || 0;
        const propertyMultiplier = propertyTypes.find(p => p.id === formData.propertyType)?.multiplier || 1;

        let total = 0;
        formData.services.forEach(serviceId => {
            const service = services.find(s => s.id === serviceId);
            if (service) {
                total += service.pricePerSqFt * sqFt;
            }
        });

        total *= propertyMultiplier;

        setEstimate({
            min: Math.floor(total * 0.85),
            max: Math.floor(total * 1.15),
            average: Math.floor(total)
        });
        setStep(3);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        // Here you would send the data to your backend
        console.log('Form submitted:', { ...formData, estimate });
        alert('Thank you! We\'ll send you a detailed quote within 24 hours.');
        // Reset form
        setStep(1);
        setFormData({
            propertyType: '',
            services: [],
            squareFeet: '',
            name: '',
            email: '',
            phone: ''
        });
        setEstimate(null);
    };

    return (
        <div className="calculator-widget">
            <div className="calculator-header">
                <h3>Get Your Free Instant Estimate</h3>
                <p>Answer a few quick questions to see what your project might cost</p>
                <div className="progress-bar">
                    <div className="progress-fill" style={{ width: `${(step / 3) * 100}%` }}></div>
                </div>
            </div>

            <div className="calculator-body">
                {step === 1 && (
                    <div className="step step-1">
                        <h4>What type of property do you have?</h4>
                        <div className="property-grid">
                            {propertyTypes.map(type => (
                                <button
                                    key={type.id}
                                    className={`property-card ${formData.propertyType === type.id ? 'active' : ''}`}
                                    onClick={() => setFormData({ ...formData, propertyType: type.id })}
                                >
                                    <div className="property-icon">
                                        {type.id === 'villa' && '🏡'}
                                        {type.id === 'apartment' && '🏢'}
                                        {type.id === 'townhouse' && '🏘️'}
                                        {type.id === 'commercial' && '🏬'}
                                    </div>
                                    <span>{type.name}</span>
                                </button>
                            ))}
                        </div>

                        <div className="input-group">
                            <label>Outdoor Space (Square Feet)</label>
                            <input
                                type="number"
                                placeholder="e.g., 2000"
                                value={formData.squareFeet}
                                onChange={(e) => setFormData({ ...formData, squareFeet: e.target.value })}
                                className="calc-input"
                            />
                        </div>

                        <button
                            className="btn-next"
                            disabled={!formData.propertyType || !formData.squareFeet}
                            onClick={() => setStep(2)}
                        >
                            Next Step →
                        </button>
                    </div>
                )}

                {step === 2 && (
                    <div className="step step-2">
                        <h4>What services are you interested in?</h4>
                        <p className="step-subtitle">Select all that apply</p>
                        <div className="services-list">
                            {services.map(service => (
                                <label key={service.id} className="service-checkbox">
                                    <input
                                        type="checkbox"
                                        checked={formData.services.includes(service.id)}
                                        onChange={() => handleServiceToggle(service.id)}
                                    />
                                    <span className="checkmark"></span>
                                    <span className="service-name">{service.name}</span>
                                    <span className="service-price">~AED {service.pricePerSqFt}/sq ft</span>
                                </label>
                            ))}
                        </div>

                        <div className="step-actions">
                            <button className="btn-back" onClick={() => setStep(1)}>
                                ← Back
                            </button>
                            <button
                                className="btn-next"
                                disabled={formData.services.length === 0}
                                onClick={calculateEstimate}
                            >
                                Calculate Estimate
                            </button>
                        </div>
                    </div>
                )}

                {step === 3 && estimate && (
                    <div className="step step-3">
                        <div className="estimate-result">
                            <div className="estimate-icon">💰</div>
                            <h4>Your Estimated Project Cost</h4>
                            <div className="estimate-range">
                                <div className="estimate-box">
                                    <span className="estimate-label">Minimum</span>
                                    <span className="estimate-value">AED {estimate.min.toLocaleString()}</span>
                                </div>
                                <div className="estimate-box highlight">
                                    <span className="estimate-label">Average</span>
                                    <span className="estimate-value">AED {estimate.average.toLocaleString()}</span>
                                </div>
                                <div className="estimate-box">
                                    <span className="estimate-label">Maximum</span>
                                    <span className="estimate-value">AED {estimate.max.toLocaleString()}</span>
                                </div>
                            </div>
                            <p className="estimate-disclaimer">
                                *This is a ballpark estimate. Final pricing depends on site conditions, material choices, and design complexity.
                            </p>
                        </div>

                        <div className="lead-capture">
                            <h5>Get Your Detailed Quote</h5>
                            <p>Enter your details and we'll send you a personalized quote within 24 hours</p>
                            <form onSubmit={handleSubmit}>
                                <input
                                    type="text"
                                    placeholder="Your Name"
                                    value={formData.name}
                                    onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                                    required
                                    className="calc-input"
                                />
                                <input
                                    type="email"
                                    placeholder="Email Address"
                                    value={formData.email}
                                    onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                                    required
                                    className="calc-input"
                                />
                                <input
                                    type="tel"
                                    placeholder="Phone Number"
                                    value={formData.phone}
                                    onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                                    required
                                    className="calc-input"
                                />
                                <button type="submit" className="btn-submit">
                                    Get My Detailed Quote 📧
                                </button>
                            </form>
                        </div>
                    </div>
                )}
            </div>
        </div>
    );
};

export default CostCalculator;
