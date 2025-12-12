import React, { useState } from 'react';

const Gallery = () => {
    const [selectedImage, setSelectedImage] = useState(null);
    const [filter, setFilter] = useState('all');

    const projects = [
        {
            id: 1,
            title: 'Luxury Residential Garden',
            category: 'residential',
            image: 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Modern luxury garden with lush landscaping and water features'
        },
        {
            id: 2,
            title: 'Commercial Property Landscaping',
            category: 'commercial',
            image: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Contemporary commercial landscaping with geometric designs'
        },
        {
            id: 3,
            title: 'Backyard Pool Paradise',
            category: 'residential',
            image: 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Elegant backyard transformation with pool and outdoor living'
        },
        {
            id: 4,
            title: 'Front Yard Transformation',
            category: 'residential',
            image: 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Beautiful front yard with curved stone walls and vibrant plants'
        },
        {
            id: 5,
            title: 'Rooftop Garden Dubai',
            category: 'commercial',
            image: 'https://images.unsplash.com/photo-1600607687644-c7171b42498f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Stunning rooftop garden with city skyline views'
        },
        {
            id: 6,
            title: 'Mediterranean Courtyard',
            category: 'residential',
            image: 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Mediterranean style courtyard with terracotta and olive trees'
        },
        {
            id: 7,
            title: 'Desert Landscape Design',
            category: 'commercial',
            image: 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Sustainable desert landscaping with native plants'
        },
        {
            id: 8,
            title: 'Garden Pathway Design',
            category: 'hardscaping',
            image: 'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Custom stone pathway with integrated lighting'
        },
        {
            id: 9,
            title: 'Outdoor Living Space',
            category: 'hardscaping',
            image: 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            description: 'Complete outdoor kitchen and entertainment area'
        }
    ];

    const categories = [
        { id: 'all', label: 'All Projects' },
        { id: 'residential', label: 'Residential' },
        { id: 'commercial', label: 'Commercial' },
        { id: 'hardscaping', label: 'Hardscaping' }
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
                        Explore our collection of stunning landscape projects across the UAE.
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
                    <button className="lightbox-close" onClick={closeLightbox}>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <button
                        className="lightbox-nav lightbox-prev"
                        onClick={(e) => { e.stopPropagation(); navigateImage('prev'); }}
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={2} stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <button
                        className="lightbox-nav lightbox-next"
                        onClick={(e) => { e.stopPropagation(); navigateImage('next'); }}
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
