import React, { useState, useEffect } from 'react';

const CostCalculator = ({ title, subtitle, content }) => {
    const [step, setStep] = useState(1);
    const [loading, setLoading] = useState(true);
    const [submitting, setSubmitting] = useState(false);
    const [options, setOptions] = useState({ property_type: [], service: [] });
    const [formData, setFormData] = useState({
        propertyType: '',
        services: [],
        squareFeet: '',
        name: '',
        email: '',
        phone: ''
    });
    const [estimate, setEstimate] = useState(null);

    // Helpers to get dynamic text from 'content' prop
    const getDynamicText = (itemTitle, defaultText) => {
        const item = content?.find(i => i.title === itemTitle);
        return item ? item.description : defaultText;
    };

    useEffect(() => {
        fetch('/api/calculator-options')
            .then(res => res.json())
            .then(data => {
                setOptions(data);
                setLoading(false);
            })
            .catch(err => {
                console.error('Error fetching options:', err);
                setLoading(false);
            });
    }, []);

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
        const propertyOption = options.property_type.find(p => p.name === formData.propertyType);
        const propertyMultiplier = propertyOption ? parseFloat(propertyOption.value) : 1;

        let total = 0;
        formData.services.forEach(serviceName => {
            const service = options.service.find(s => s.name === serviceName);
            if (service) {
                total += parseFloat(service.value) * sqFt;
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
        setSubmitting(true);

        try {
            const response = await fetch('/api/estimate-requests', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    property_type: formData.propertyType,
                    square_feet: formData.squareFeet,
                    services: formData.services,
                    estimate_min: estimate.min,
                    estimate_max: estimate.max,
                    estimate_average: estimate.average,
                    user_name: formData.name,
                    user_email: formData.email,
                    user_phone: formData.phone
                })
            });

            if (response.ok) {
                alert('Thank you! We\'ve received your request and will send you a detailed quote within 24 hours.');
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
            } else {
                const errorData = await response.json();
                alert('Something went wrong: ' + (errorData.message || 'Please try again.'));
            }
        } catch (error) {
            console.error('Submission error:', error);
            alert('Failed to connect to the server. Please check your connection.');
        } finally {
            setSubmitting(false);
        }
    };

    if (loading) {
        return <div className="calculator-widget loading">Loading calculator...</div>;
    }

    return (
        <div className="calculator-widget">
            <div className="calculator-header">
                <h3>{title || 'Get Your Free Instant Estimate'}</h3>
                <p>{subtitle || 'Answer a few quick questions to see what your project might cost'}</p>
                <div className="progress-bar">
                    <div className="progress-fill" style={{ width: `${(step / 3) * 100}%` }}></div>
                </div>
            </div>

            <div className="calculator-body">
                {step === 1 && (
                    <div className="step step-1">
                        <h4>{getDynamicText('Property Question', 'What type of property do you have?')}</h4>
                        <div className="property-grid">
                            {options.property_type.map(type => (
                                <button
                                    key={type.id}
                                    type="button"
                                    className={`property-card ${formData.propertyType === type.name ? 'active' : ''}`}
                                    onClick={() => setFormData({ ...formData, propertyType: type.name })}
                                >
                                    <div className="property-icon">
                                        {type.icon || '🏡'}
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
                        <h4>{getDynamicText('Service Question', 'What services are you interested in?')}</h4>
                        <p className="step-subtitle">Select all that apply</p>
                        <div className="services-list">
                            {options.service.map(service => (
                                <label key={service.id} className="service-checkbox">
                                    <input
                                        type="checkbox"
                                        checked={formData.services.includes(service.name)}
                                        onChange={() => handleServiceToggle(service.name)}
                                    />
                                    <span className="checkmark"></span>
                                    <span className="service-name">{service.name}</span>
                                    <span className="service-price">~AED {service.value}/sq ft</span>
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
                            <h4>{getDynamicText('Estimate Title', 'Your Estimated Project Cost')}</h4>
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
                                <button type="submit" className="btn-submit" disabled={submitting}>
                                    {submitting ? 'Submitting...' : 'Get My Detailed Quote 📧'}
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
