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
                    'Regular pool cleaning and servicing',
                    'Chemical balance management',
                    'Equipment inspection and repair',
                    'Pond and fountain maintenance'
                ]
            ],
            [
                'title' => 'Automatic Irrigation System',
                'description' => 'Smart irrigation solutions designed for water efficiency and optimal plant health in UAE\'s climate.',
                'icon' => '💧',
                'type' => 'main',
                'sort_order' => 2,
                'features' => [
                    'Custom irrigation design and installation',
                    'Smart controller integration',
                    'Drip and sprinkler systems',
                    'Water conservation solutions'
                ]
            ],
            [
                'title' => 'Indoor Garden Installation, Care & Maintenance',
                'description' => 'Transform interior spaces with lush greenery, from living walls to potted plant arrangements.',
                'icon' => '🪴',
                'type' => 'main',
                'sort_order' => 3,
                'features' => [
                    'Indoor plant selection and installation',
                    'Living wall design and construction',
                    'Regular maintenance and care',
                    'Plant health monitoring'
                ]
            ],
            [
                'title' => 'Outdoor Garden Care & Maintenance',
                'description' => 'Comprehensive outdoor maintenance services to keep your landscape healthy, vibrant, and beautiful.',
                'icon' => '🌳',
                'type' => 'main',
                'sort_order' => 4,
                'features' => [
                    'Lawn mowing and edging',
                    'Pruning and trimming',
                    'Fertilization and pest control',
                    'Seasonal plantings and cleanups'
                ]
            ],
            [
                'title' => 'Hardscaping',
                'description' => 'Durable and beautiful hardscape elements that define and enhance your outdoor living spaces.',
                'icon' => '🧱',
                'type' => 'main',
                'sort_order' => 5,
                'features' => [
                    'Tile work and paving',
                    'Rockery gardens and paths',
                    'Wood composite & timber decks',
                    'Walls, fences, and trellis',
                    'Stepping stones and gravel work',
                    'Outdoor structures and playgrounds'
                ]
            ],
            [
                'title' => 'Artificial Grass and Plants Installation',
                'description' => 'Low-maintenance, year-round green solutions perfect for UAE\'s climate',
                'icon' => '🌱',
                'type' => 'specialized',
                'sort_order' => 6,
                'features' => []
            ],
            [
                'title' => 'Composite Works',
                'description' => 'Children\'s play equipment, artificial rock work, landscape lighting, pergolas & gazebos, shade structures, timber bridges and decking',
                'icon' => '🎨',
                'type' => 'specialized',
                'sort_order' => 7,
                'features' => []
            ],
            [
                'title' => 'Custom Landscape Features',
                'description' => 'Bespoke outdoor elements tailored to your vision and property requirements',
                'icon' => '🏗️',
                'type' => 'specialized',
                'sort_order' => 8,
                'features' => []
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
    }
}
