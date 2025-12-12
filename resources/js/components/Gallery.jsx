import React, { useState } from 'react';

const Gallery = () => {
    const [selectedImage, setSelectedImage] = useState(null);
    const [filter, setFilter] = useState('all');

    const projects = [
        // Pool & Water Feature Maintenance
        {
            id: 1,
            title: 'Pool Cleaning & Maintenance',
            category: 'pool-maintenance',
            image: 'https://images.unsplash.com/photo-1575429198097-0414ec08e8cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Professional pool cleaning and chemical balancing services'
        },
        {
            id: 2,
            title: 'Water Feature Maintenance',
            category: 'pool-maintenance',
            image: 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Regular maintenance for fountains and water features'
        },

        // Hardscaping
        {
            id: 4,
            title: 'Outdoor Patio & Deck',
            category: 'hardscaping',
            image: 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Composite timber deck with built-in seating and pergola'
        },
        {
            id: 5,
            title: 'Stone Pathway Design',
            category: 'hardscaping',
            image: 'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Natural stone stepping path through landscaped garden'
        },
        {
            id: 6,
            title: 'Retaining Wall & Steps',
            category: 'hardscaping',
            image: 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Tiered retaining walls with integrated landscape lighting'
        },

        // Irrigation Systems
        {
            id: 7,
            title: 'Smart Irrigation Installation',
            category: 'irrigation',
            image: 'https://images.unsplash.com/photo-1625246333195-78d9c38ad449?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Automated drip irrigation system with smart controller'
        },
        {
            id: 8,
            title: 'Sprinkler System Design',
            category: 'irrigation',
            image: 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Comprehensive lawn irrigation with zone control'
        },

        // Indoor Gardens
        {
            id: 9,
            title: 'Living Wall Installation',
            category: 'indoor-garden',
            image: 'https://images.unsplash.com/photo-1597958636446-03ee2f7a4e6c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Vertical garden wall for office lobby with automated irrigation'
        },
        {
            id: 10,
            title: 'Indoor Plant Arrangement',
            category: 'indoor-garden',
            image: 'https://images.unsplash.com/photo-1463320726281-696a485928c7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Curated indoor plant collection for residential atrium'
        },

        // Outdoor Garden Maintenance
        {
            id: 11,
            title: 'Residential Garden Landscape',
            category: 'outdoor-maintenance',
            image: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Lush garden with seasonal flowers and manicured lawn'
        },
        {
            id: 12,
            title: 'Commercial Property Landscaping',
            category: 'outdoor-maintenance',
            image: 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Professional landscape maintenance for corporate campus'
        },

        // Specialized Services
        {
            id: 13,
            title: 'Artificial Grass Installation',
            category: 'specialized',
            image: 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Premium artificial turf for year-round green lawn'
        },
        {
            id: 14,
            title: 'Pergola & Shade Structure',
            category: 'specialized',
            image: 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Custom wooden pergola with climbing plants and outdoor lighting'
        },
        {
            id: 15,
            title: 'Desert Landscape Design',
            category: 'outdoor-maintenance',
            image: 'https://images.unsplash.com/photo-1600607687644-c7171b42498f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Sustainable desert landscaping with native plants'
        }
    ];

    const categories = [
        { id: 'all', label: 'All Projects', icon: '🌿' },
        { id: 'pool-maintenance', label: 'Pool Maintenance', icon: '💦' },
        { id: 'hardscaping', label: 'Hardscaping', icon: '🧱' },
        { id: 'irrigation', label: 'Irrigation Systems', icon: '💧' },
        { id: 'indoor-garden', label: 'Indoor Gardens', icon: '🪴' },
        { id: 'outdoor-maintenance', label: 'Outdoor Maintenance', icon: '🌳' },
        { id: 'specialized', label: 'Specialized Services', icon: '🌱' }
    ];

    const filteredProjects = filter === 'all'
        ? projects
        : projects.filter(project => project.category === filter);

    const openLightbox = (project) => {
        setSelectedImage(project);
    };

    const closeLightbox = () => {
        setSelectedImage(null);
    };

    const navigateImage = (direction) => {
        const currentIndex = filteredProjects.findIndex(p => p.id === selectedImage.id);
        let newIndex;

        if (direction === 'next') {
            newIndex = (currentIndex + 1) % filteredProjects.length;
        } else {
            newIndex = (currentIndex - 1 + filteredProjects.length) % filteredProjects.length;
        }

        setSelectedImage(filteredProjects[newIndex]);
    };

    return (
        <div className="gallery-container">
            <div className="gallery-header">
                <div className="gallery-title-section">
                    <p className="gallery-label">Our Portfolio</p>
                    <h2 className="gallery-heading">Transforming Visions Into Reality</h2>
                    <p className="gallery-subtitle">
                        Explore our collection of completed projects across all our service categories.
                        Each project showcases our commitment to excellence and attention to detail.
                    </p>
                </div>

                <div className="gallery-filters">
                    {categories.map(cat => (
                        <button
                            key={cat.id}
                            className={`filter-btn ${filter === cat.id ? 'active' : ''}`}
                            onClick={() => setFilter(cat.id)}
                        >
                            <span style={{ marginRight: '0.5rem' }}>{cat.icon}</span>
                            {cat.label}
                        </button>
                    ))}
                </div>
            </div>

            <div className="gallery-grid">
                {filteredProjects.map((project, index) => (
                    <div
                        key={project.id}
                        className="gallery-item"
                        style={{ animationDelay: `${index * 0.1}s` }}
                        onClick={() => openLightbox(project)}
                    >
                        <div className="gallery-item-image">
                            <img src={project.image} alt={project.title} loading="lazy" />
                            <div className="gallery-item-overlay">
                                <div className="gallery-item-content">
                                    <h3>{project.title}</h3>
                                    <p>{project.description}</p>
                                    <span className="view-project">View Project →</span>
                                </div>
                            </div>
                        </div>
                    </div>
                ))}
            </div>

            {/* Lightbox Modal */}
            {selectedImage && (
                <div className="lightbox-overlay" onClick={closeLightbox}>
                    <button className="lightbox-close" onClick={closeLightbox} aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <button
                        className="lightbox-nav lightbox-prev"
                        onClick={(e) => { e.stopPropagation(); navigateImage('prev'); }}
                        aria-label="Previous image"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <button
                        className="lightbox-nav lightbox-next"
                        onClick={(e) => { e.stopPropagation(); navigateImage('next'); }}
                        aria-label="Next image"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>

                    <div className="lightbox-content" onClick={(e) => e.stopPropagation()}>
                        <img src={selectedImage.image} alt={selectedImage.title} />
                        <div className="lightbox-info">
                            <h3>{selectedImage.title}</h3>
                            <p>{selectedImage.description}</p>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
};

export default Gallery;
