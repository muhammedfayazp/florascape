<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ProjectCategory;
use App\Models\Project;
use App\Models\SiteSetting;

class DemoContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Site Settings
        SiteSetting::firstOrCreate([], ['is_published' => true]);

        // 2. Services
        $services = [
            [
                'title' => 'Swimming Pool & Water Feature Care and Maintenance',
                'description' => 'Professional cleaning, chemical balancing, and maintenance to keep your water features pristine year-round.',
                'icon' => '💦',
                'type' => 'main',
                'sort_order' => 1,
                'features' => [
                    'Regular pool cleaning',
                    'Chemical balancing',
                    'Equipment maintenance',
                    'Water feature care'
                ]
            ],
            [
                'title' => 'Automatic Irrigation System',
                'description' => 'Smart irrigation solutions designed for water efficiency and optimal plant health in UAE\'s climate.',
                'icon' => '💧',
                'type' => 'main',
                'sort_order' => 2,
                'features' => [
                    'Smart irrigation design',
                    'Water efficiency',
                    'Plant health monitoring',
                    'System maintenance'
                ]
            ],
            [
                'title' => 'Indoor Garden Installation, Care & Maintenance',
                'description' => 'Transform interior spaces with lush greenery, from living walls to potted plant arrangements.',
                'icon' => '🪴',
                'type' => 'main',
                'sort_order' => 3,
                'features' => [
                    'Living wall installation',
                    'Potted plant arrangements',
                    'Indoor garden care',
                    'Regular maintenance'
                ]
            ],
            [
                'title' => 'Outdoor Garden Care & Maintenance',
                'description' => 'Comprehensive outdoor maintenance services to keep your landscape healthy, vibrant, and beautiful.',
                'icon' => '🌳',
                'type' => 'main',
                'sort_order' => 4,
                'features' => [
                    'Landscape health',
                    'Horticultural care',
                    'Vibrant gardens',
                    'Expert maintenance'
                ]
            ],
            [
                'title' => 'Hardscaping',
                'description' => 'Durable and beautiful hardscape elements that define and enhance your outdoor living spaces.',
                'icon' => '🧱',
                'type' => 'main',
                'sort_order' => 5,
                'features' => [
                    'Durable elements',
                    'Outdoor living paths',
                    'Wall construction',
                    'Patio design'
                ]
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                $service
            );
        }

        // 3. Project Categories
        $categories = [
            ['name' => 'Pool Maintenance', 'slug' => 'pool-maintenance', 'icon' => '💦', 'sort_order' => 1],
            ['name' => 'Hardscaping', 'slug' => 'hardscaping', 'icon' => '🧱', 'sort_order' => 2],
            ['name' => 'Irrigation Systems', 'slug' => 'irrigation', 'icon' => '💧', 'sort_order' => 3],
            ['name' => 'Indoor Gardens', 'slug' => 'indoor-garden', 'icon' => '🪴', 'sort_order' => 4],
            ['name' => 'Outdoor Maintenance', 'slug' => 'outdoor-maintenance', 'icon' => '🌳', 'sort_order' => 5],
            ['name' => 'Specialized Services', 'slug' => 'specialized', 'icon' => '🌱', 'sort_order' => 6],
        ];

        foreach ($categories as $cat) {
            ProjectCategory::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }

        // 4. Projects (Linked to Categories)
        $projects = [
            // Pool & Water Feature
            [
                'category_slug' => 'pool-maintenance',
                'title' => 'Pool Cleaning & Maintenance',
                'description' => 'Professional pool cleaning and chemical balancing services',
                'image' => 'https://images.unsplash.com/photo-1575429198097-0414ec08e8cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'category_slug' => 'pool-maintenance',
                'title' => 'Water Feature Maintenance',
                'description' => 'Regular maintenance for fountains and water features',
                'image' => 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            // Hardscaping
            [
                'category_slug' => 'hardscaping',
                'title' => 'Outdoor Patio & Deck',
                'description' => 'Composite timber deck with built-in seating and pergola',
                'image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'category_slug' => 'hardscaping',
                'title' => 'Stone Pathway Design',
                'description' => 'Natural stone stepping path through landscaped garden',
                'image' => 'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            // Irrigation
            [
                'category_slug' => 'irrigation',
                'title' => 'Smart Irrigation Installation',
                'description' => 'Automated drip irrigation system with smart controller',
                'image' => 'https://images.unsplash.com/photo-1625246333195-78d9c38ad449?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'category_slug' => 'irrigation',
                'title' => 'Sprinkler System Design',
                'description' => 'Comprehensive lawn irrigation with zone control',
                'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            // Indoor
            [
                'category_slug' => 'indoor-garden',
                'title' => 'Living Wall Installation',
                'description' => 'Vertical garden wall for office lobby with automated irrigation',
                'image' => 'https://images.unsplash.com/photo-1597958636446-03ee2f7a4e6c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            // Outdoor
            [
                'category_slug' => 'outdoor-maintenance',
                'title' => 'Residential Garden Landscape',
                'description' => 'Lush garden with seasonal flowers and manicured lawn',
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'category_slug' => 'outdoor-maintenance',
                'title' => 'Commercial Property Landscaping',
                'description' => 'Professional landscape maintenance for corporate campus',
                'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            // Specialized
            [
                'category_slug' => 'specialized',
                'title' => 'Artificial Grass Installation',
                'description' => 'Premium artificial turf for year-round green lawn',
                'image' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'category_slug' => 'specialized',
                'title' => 'Pergola & Shade Structure',
                'description' => 'Custom wooden pergola with climbing plants and outdoor lighting',
                'image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
        ];

        foreach ($projects as $project) {
            $category = ProjectCategory::where('slug', $project['category_slug'])->first();

            if ($category) {
                Project::updateOrCreate(
                    ['title' => $project['title']],
                    [
                        'description' => $project['description'],
                        'image' => $project['image'],
                        'project_category_id' => $category->id,
                        'sort_order' => 0
                    ]
                );
            }
        }
        // 5. Sliders
        $slides = [
            [
                'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80',
                'title' => 'Transform Your Outdoors into a Luxury Oasis',
                'description' => 'Premium Landscaping & Pool Solutions in the UAE | Residential & Commercial Projects',
                'link' => '/contact',
                'cta_text' => 'Get A Quote'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1600607686527-6fb886090705?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80',
                'title' => 'Expert Craftsmanship for Every Scale',
                'description' => 'From intricate garden designs to expansive commercial developments.',
                'link' => '/services',
                'cta_text' => 'View Services'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80',
                'title' => 'Sustainable Beauty, Built to Last',
                'description' => 'Eco-friendly irrigation and native plant selection for the UAE climate.',
                'link' => '/contact',
                'cta_text' => 'Contact Us'
            ],
        ];

        \App\Models\Slider::updateOrCreate(
            ['type' => 'homepage'],
            ['slides' => $slides]
        );

        // 6. Page Sections
        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'about_us'],
            [
                'title' => 'Transforming Landscapes, Enriching Lives',
                'subtitle' => 'Our Story',
                'content' => [
                    ['description' => 'At Florascape Landscape LLC, we believe that outdoor spaces are more than just land – they are living canvases waiting to be transformed into masterpieces.'],
                    ['description' => 'With over a decade of experience in the UAE, our team of dedicated designers and craftsmen blend traditional expertise with modern sustainability to create unique outdoor environments.'],
                    ['description' => 'From private residential gardens to large-scale commercial developments, we handle every project with precision, passion, and a commitment to excellence.']
                ],
                'image' => 'https://images.unsplash.com/photo-1598902108854-10e335adac99?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'why_choose_us'],
            [
                'title' => 'Why Choose Florascape?',
                'subtitle' => 'The Florascape Difference',
                'content' => [
                    ['title' => 'Quality Workmanship', 'description' => 'Uncompromising attention to detail in every brick laid and plant placed.'],
                    ['title' => 'Timely Delivery', 'description' => 'We respect your time and commitments, ensuring projects are completed as scheduled.'],
                    ['title' => 'Sustainable Practices', 'description' => 'Eco-friendly solutions designed specifically for the UAE climate.'],
                    ['title' => 'Bespoke Design', 'description' => 'Tailored landscapes that reflect your personality and lifestyle.']
                ],
                'is_active' => true,
                'sort_order' => 2,
            ]
        );

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'cost_calculator'],
            [
                'title' => 'Get Your Free Instant Estimate',
                'subtitle' => 'Answer a few quick questions to see what your project might cost',
                'content' => [
                    ['title' => 'Property Question', 'description' => 'What type of property do you have?'],
                    ['title' => 'Service Question', 'description' => 'What services are you interested in?'],
                    ['title' => 'Estimate Title', 'description' => 'Your Estimated Project Cost'],
                ],
                'is_active' => true,
                'sort_order' => 2,
            ]
        );

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'about_hero'],
            [
                'title' => 'About Florascape',
                'subtitle' => 'Cultivating beauty and harmony in every outdoor space we touch.',
                'content' => [],
                'is_active' => true,
                'sort_order' => 4,
            ]
        );

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'about_story'],
            [
                'title' => 'Our Story',
                'subtitle' => '"We don\'t just plant gardens; we create sanctuaries where memories are grown." — Sarah Jenkins, Founder',
                'image' => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'content' => [
                    ['description' => 'Founded in 2010, Florascape began with a simple mission: to reconnect people with nature through thoughtful landscape design.'],
                    ['description' => 'We believe that a garden is more than just plants; it\'s a living ecosystem that enhances your quality of life. Our approach combines horticultural expertise with artistic vision.'],
                ],
                'is_active' => true,
                'sort_order' => 5,
            ]
        );

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'about_values'],
            [
                'title' => 'Our Values',
                'content' => [
                    ['title' => 'Sustainability', 'description' => 'We prioritize native plants, water-efficient irrigation, and organic fertilizers to protect our local ecosystem.'],
                    ['title' => 'Quality', 'description' => 'We source only the healthiest plants and highest-grade materials to ensure your landscape stands the test of time.'],
                    ['title' => 'Integrity', 'description' => 'Honest communication, transparent pricing, and a commitment to doing what we say we\'ll do.'],
                ],
                'is_active' => true,
                'sort_order' => 6,
            ]
        );

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'about_team'],
            [
                'title' => 'Meet The Team',
                'content' => [
                    [
                        'title' => 'Sarah Jenkins',
                        'description' => 'Founder & Lead Designer. 20+ years of landscape architecture experience.',
                        'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=600&q=80'
                    ],
                    [
                        'title' => 'Michael Chen',
                        'description' => 'Operations Manager. Ensures every project runs smoothly and on time.',
                        'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=600&q=80'
                    ],
                    [
                        'title' => 'Emma Rodriguez',
                        'description' => 'Head Horticulturist. Expert in native flora and plant health.',
                        'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=600&q=80'
                    ],
                ],
                'is_active' => true,
                'sort_order' => 7,
            ]
        );

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'contact_hero'],
            [
                'title' => 'Get In Touch',
                'subtitle' => 'We\'d love to hear about your project. Fill out the form below or give us a call.',
                'is_active' => true,
                'sort_order' => 8,
            ]
        );

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'contact_info'],
            [
                'title' => 'Contact Information',
                'subtitle' => 'Reach out to us for consultations, quotes, or any questions you might have.',
                'content' => [
                    ['title' => 'Address', 'description' => '123 Green Valley Way, Springfield, ST 12345'],
                    ['title' => 'Phone', 'description' => '(555) 123-4567'],
                    ['title' => 'Email', 'description' => 'hello@florascape.com'],
                    ['title' => 'Hours', 'description' => 'Mon-Fri: 8am - 6pm, Sat: 9am - 4pm, Sun: Closed'],
                ],
                'is_active' => true,
                'sort_order' => 9,
            ]
        );

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'services_hero'],
            [
                'title' => 'Design. Build. Maintain.',
                'subtitle' => 'Comprehensive landscaping solutions from pool construction to garden maintenance',
                'is_active' => true,
                'sort_order' => 10,
            ]
        );

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'portfolio_hero'],
            [
                'title' => 'Landscape & Pool Gallery',
                'subtitle' => 'Explore our portfolio of transformed outdoor spaces, from private residential oases to expansive commercial landscapes across the UAE.',
                'is_active' => true,
                'sort_order' => 11,
            ]
        );

        // Calculator Options
        $propertyTypes = [
            ['name' => 'Villa', 'value' => 1.2, 'icon' => '🏡'],
            ['name' => 'Apartment', 'value' => 0.8, 'icon' => '🏢'],
            ['name' => 'Townhouse', 'value' => 1.0, 'icon' => '🏘️'],
            ['name' => 'Commercial Property', 'value' => 1.5, 'icon' => '🏬'],
        ];

        foreach ($propertyTypes as $index => $type) {
            \App\Models\CalculatorOption::updateOrCreate(
                ['type' => 'property_type', 'name' => $type['name']],
                ['value' => $type['value'], 'icon' => $type['icon'], 'sort_order' => $index, 'is_active' => true]
            );
        }

        $calcServices = [
            ['name' => 'Landscape Design', 'value' => 25, 'icon' => '🎨'],
            ['name' => 'Lawn Care & Maintenance', 'value' => 8, 'icon' => '🌱'],
            ['name' => 'Hardscaping (Patios, Walkways)', 'value' => 150, 'icon' => '🧱'],
            ['name' => 'Irrigation System', 'value' => 35, 'icon' => '💧'],
            ['name' => 'Pool Area Landscaping', 'value' => 200, 'icon' => '🏊'],
            ['name' => 'Garden Lighting', 'value' => 45, 'icon' => '💡'],
        ];

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'our_expertise'],
            [
                'title' => 'Our Expertise',
                'subtitle' => 'Comprehensive landscape solutions from design to maintenance',
                'content' => [
                    [
                        'title' => 'Swimming Pool & Water Feature Care and Maintenance',
                        'description' => 'Professional cleaning, chemical balancing, and maintenance to keep your water features pristine year-round.',
                        'icon' => '💦',
                    ],
                    [
                        'title' => 'Automatic Irrigation System',
                        'description' => 'Smart irrigation solutions designed for water efficiency and optimal plant health in UAE\'s climate.',
                        'icon' => '💧',
                    ],
                    [
                        'title' => 'Indoor Garden Installation, Care & Maintenance',
                        'description' => 'Transform interior spaces with lush greenery, from living walls to potted plant arrangements.',
                        'icon' => '🪴',
                    ],
                    [
                        'title' => 'Outdoor Garden Care & Maintenance',
                        'description' => 'Comprehensive outdoor maintenance services to keep your landscape healthy, vibrant, and beautiful.',
                        'icon' => '🌳',
                    ],
                    [
                        'title' => 'Hardscaping',
                        'description' => 'Durable and beautiful hardscape elements that define and enhance your outdoor living spaces.',
                        'icon' => '🧱',
                    ],
                ],
                'is_active' => true,
                'sort_order' => 3,
            ]
        );

        \App\Models\PageSection::updateOrCreate(
            ['section_key' => 'footer_cta'],
            [
                'title' => 'Ready to Transform Your Landscape?',
                'subtitle' => 'Contact us today for a free consultation and estimate.',
                'content' => [
                    ['description' => 'Start Your Project'],
                    ['description' => '/contact']
                ],
                'is_active' => true,
                'sort_order' => 12,
            ]
        );

        foreach ($calcServices as $index => $service) {
            \App\Models\CalculatorOption::updateOrCreate(
                ['type' => 'service', 'name' => $service['name']],
                ['value' => $service['value'], 'icon' => $service['icon'], 'sort_order' => $index, 'is_active' => true]
            );
        }
    }
}
