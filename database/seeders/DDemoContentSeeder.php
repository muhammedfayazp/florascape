<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ProjectCategory;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\PageSection;
use App\Models\Slider;
use App\Models\CalculatorOption;

class DDemoContentSeeder extends Seeder
{
    public function run(): void
    {
        // ─── 1. SITE SETTINGS ────────────────────────────────────────────────
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'is_published'      => true,
                'site_name'         => 'Florascape',
                'meta_title'        => 'Florascape – Premium Landscaping & Garden Services UAE',
                'meta_description'  => 'Transform your outdoor spaces with Florascape. Abu Dhabi\'s leading landscaping company for garden design, pool maintenance, irrigation & hardscaping.',
                'meta_keywords'     => 'landscaping UAE, garden design Abu Dhabi, pool maintenance, irrigation, hardscaping, outdoor maintenance',
                'phone'             => '+971 50 123 4567',
                'email'             => 'info@florascape.ae',
                'address'           => "Plot 12, Al Quoz Industrial Area 3\nDubai, United Arab Emirates",
                'facebook_url'      => 'https://facebook.com/florascape',
                'instagram_url'     => 'https://instagram.com/florascape',
                'linkedin_url'      => 'https://linkedin.com/company/florascape',
                'whatsapp_number'   => '971501234567',
            ]
        );

        // ─── 2. HERO SLIDER ──────────────────────────────────────────────────
        Slider::updateOrCreate(
            ['type' => 'homepage'],
            [
                'slides' => [
                    [
                        'image'       => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=2000&q=80',
                        'title'       => 'Transform Your Outdoors into a Luxury Oasis',
                        'description' => 'Premium Landscaping & Pool Solutions across the UAE — Residential & Commercial Projects.',
                        'link'        => '/contact',
                        'cta_text'    => 'Get A Free Quote',
                    ],
                    [
                        'image'       => 'https://images.unsplash.com/photo-1600607686527-6fb886090705?auto=format&fit=crop&w=2000&q=80',
                        'title'       => 'Expert Craftsmanship for Every Scale',
                        'description' => 'From intimate garden retreats to expansive commercial developments — built to last.',
                        'link'        => '/services',
                        'cta_text'    => 'View Our Services',
                    ],
                    [
                        'image'       => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?auto=format&fit=crop&w=2000&q=80',
                        'title'       => 'Sustainable Beauty, Built to Last',
                        'description' => 'Eco-friendly irrigation and native plant selection perfectly suited to the UAE climate.',
                        'link'        => '/contact',
                        'cta_text'    => 'Start Your Project',
                    ],
                ],
            ]
        );

        // ─── 3. SERVICES ─────────────────────────────────────────────────────
        $services = [
            [
                'title'       => 'Swimming Pool & Water Feature Maintenance',
                'description' => 'Professional cleaning, chemical balancing, equipment servicing, and seasonal care to keep your pool or water feature pristine year-round.',
                'icon'        => '💦',
                'type'        => 'main',
                'sort_order'  => 1,
                'features'    => [
                    ['feature' => 'Regular deep cleaning & vacuuming'],
                    ['feature' => 'Chemical balancing & pH testing'],
                    ['feature' => 'Pump, filter & heater servicing'],
                    ['feature' => 'Fountain & water feature care'],
                ],
            ],
            [
                'title'       => 'Smart Irrigation Systems',
                'description' => 'Water-efficient automated irrigation designed for the UAE climate — drip, sprinkler, and smart controller installations.',
                'icon'        => '💧',
                'type'        => 'main',
                'sort_order'  => 2,
                'features'    => [
                    ['feature' => 'Bespoke system design & layout'],
                    ['feature' => 'Drip & sprinkler installation'],
                    ['feature' => 'Smart timer & sensor integration'],
                    ['feature' => 'Seasonal adjustments & maintenance'],
                ],
            ],
            [
                'title'       => 'Indoor Garden Design & Maintenance',
                'description' => 'Transform interior spaces with living walls, potted plant compositions, and ongoing horticultural care.',
                'icon'        => '🪴',
                'type'        => 'main',
                'sort_order'  => 3,
                'features'    => [
                    ['feature' => 'Living wall & moss wall installation'],
                    ['feature' => 'Premium pot & planter sourcing'],
                    ['feature' => 'Scheduled watering & fertilising'],
                    ['feature' => 'Plant replacement & repotting'],
                ],
            ],
            [
                'title'       => 'Outdoor Garden Care & Maintenance',
                'description' => 'Comprehensive landscape upkeep — lawn care, pruning, fertilising, and seasonal planting to keep your garden vibrant.',
                'icon'        => '🌳',
                'type'        => 'main',
                'sort_order'  => 4,
                'features'    => [
                    ['feature' => 'Lawn mowing, edging & aeration'],
                    ['feature' => 'Shrub & tree pruning'],
                    ['feature' => 'Seasonal planting & mulching'],
                    ['feature' => 'Pest & disease management'],
                ],
            ],
            [
                'title'       => 'Hardscaping & Outdoor Structures',
                'description' => 'Durable patios, walkways, retaining walls, pergolas, and decorative stonework that define and elevate outdoor living.',
                'icon'        => '🧱',
                'type'        => 'main',
                'sort_order'  => 5,
                'features'    => [
                    ['feature' => 'Patio & deck construction'],
                    ['feature' => 'Natural & porcelain stone paving'],
                    ['feature' => 'Retaining walls & raised beds'],
                    ['feature' => 'Pergolas, gazebos & shade sails'],
                ],
            ],
            [
                'title'       => 'Landscape Design & Consultancy',
                'description' => 'End-to-end concept-to-completion design service — 2D layouts, 3D renders, plant schedules, and project management.',
                'icon'        => '🎨',
                'type'        => 'main',
                'sort_order'  => 6,
                'features'    => [
                    ['feature' => 'Site survey & concept development'],
                    ['feature' => '2D/3D design & visualisation'],
                    ['feature' => 'Plant selection & specification'],
                    ['feature' => 'Full project management & handover'],
                ],
            ],
            // Specialized
            ['title' => 'Artificial Grass Installation',   'description' => 'Premium synthetic turf for a lush, maintenance-free lawn that stays green year-round in UAE\'s harsh climate.',          'icon' => '🌿', 'type' => 'specialized', 'sort_order' => 1, 'features' => []],
            ['title' => 'Outdoor Lighting Design',         'description' => 'Architectural and atmospheric LED lighting that transforms your garden after dark while saving energy.',                   'icon' => '💡', 'type' => 'specialized', 'sort_order' => 2, 'features' => []],
            ['title' => 'Vertical Garden Systems',         'description' => 'Space-efficient green walls for residential balconies, hotel lobbies, and commercial facades.',                           'icon' => '🌱', 'type' => 'specialized', 'sort_order' => 3, 'features' => []],
            ['title' => 'Soil Improvement & Composting',   'description' => 'Expert soil analysis, amendment, and organic composting to maximise plant health and water retention.',                   'icon' => '🌍', 'type' => 'specialized', 'sort_order' => 4, 'features' => []],
            ['title' => 'Pergola & Shade Structures',      'description' => 'Bespoke timber and aluminium shade structures with optional retractable canopies and climbing plants.',                   'icon' => '🏡', 'type' => 'specialized', 'sort_order' => 5, 'features' => []],
            ['title' => 'Holiday & Event Floral Décor',    'description' => 'Seasonal planting, floral arrangements, and event staging for hotels, residences, and corporate venues.',                 'icon' => '🌸', 'type' => 'specialized', 'sort_order' => 6, 'features' => []],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['title' => $service['title']], $service);
        }

        // ─── 4. PROJECT CATEGORIES ───────────────────────────────────────────
        $categories = [
            ['name' => 'Pool & Water Features', 'slug' => 'pool-maintenance',    'icon' => '💦', 'sort_order' => 1],
            ['name' => 'Hardscaping',            'slug' => 'hardscaping',         'icon' => '🧱', 'sort_order' => 2],
            ['name' => 'Irrigation Systems',     'slug' => 'irrigation',          'icon' => '💧', 'sort_order' => 3],
            ['name' => 'Indoor Gardens',         'slug' => 'indoor-garden',       'icon' => '🪴', 'sort_order' => 4],
            ['name' => 'Outdoor Maintenance',    'slug' => 'outdoor-maintenance', 'icon' => '🌳', 'sort_order' => 5],
            ['name' => 'Landscape Design',       'slug' => 'landscape-design',    'icon' => '🎨', 'sort_order' => 6],
            ['name' => 'Specialized Services',   'slug' => 'specialized',         'icon' => '🌱', 'sort_order' => 7],
        ];

        foreach ($categories as $cat) {
            ProjectCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        // ─── 5. PROJECTS ─────────────────────────────────────────────────────
        $projects = [
            ['category' => 'pool-maintenance',    'title' => 'Villa Infinity Pool Restoration',     'description' => 'Full restoration of a 15m infinity pool in Jumeirah — resurfacing, new tiling, and equipment upgrade.',             'image' => 'https://images.unsplash.com/photo-1575429198097-0414ec08e8cd?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'pool-maintenance',    'title' => 'Resort Pool & Spa Complex',           'description' => 'Ongoing maintenance for a 5-star resort featuring three pools, two jacuzzis, and decorative fountains.',             'image' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'pool-maintenance',    'title' => 'Ornamental Fountain Installation',    'description' => 'Bespoke three-tier fountain with LED lighting and automated pump for a luxury hotel entrance.',                      'image' => 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'hardscaping',         'title' => 'Desert-Modern Patio & Fire Pit',     'description' => 'Polished concrete patio with sandstone retaining walls, built-in seating, and a sunken fire pit.',                   'image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'hardscaping',         'title' => 'Natural Limestone Pathway',          'description' => 'Meandering limestone stepping-stone path through a mature planted garden in Al Ain.',                                 'image' => 'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'hardscaping',         'title' => 'Rooftop Terrace Transformation',     'description' => 'Wood-composite decking, raised planters, pergola, and outdoor kitchen for a Dubai penthouse terrace.',               'image' => 'https://images.unsplash.com/photo-1600607688969-a5bfcd646154?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'irrigation',          'title' => 'Smart Drip Irrigation — 2-Acre Villa','description' => 'Fully automated drip system with soil moisture sensors, weather-linked controllers, and app monitoring.',            'image' => 'https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'irrigation',          'title' => 'Commercial Campus Sprinkler Network', 'description' => 'Zoned sprinkler installation across a 5-hectare business park with central management system.',                     'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'indoor-garden',       'title' => 'Corporate Lobby Living Wall',         'description' => '8m × 3m vertical garden for an Abu Dhabi financial centre with 40 species and automated irrigation.',               'image' => 'https://images.unsplash.com/photo-1597958636446-03ee2f7a4e6c?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'indoor-garden',       'title' => 'Boutique Hotel Atrium Garden',        'description' => 'Tropical indoor garden with statement palms, ferns, and ambient lighting in a 4-storey glass atrium.',              'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'outdoor-maintenance', 'title' => 'Residential Garden — Saadiyat Island','description' => 'Monthly maintenance for a 1,200 sqm garden including lawn, hedges, seasonal annuals, and irrigation checks.',        'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'outdoor-maintenance', 'title' => 'Community Park Revitalisation',       'description' => 'Full replanting, turf renovation, and tree-planting programme for a 3-hectare public park in Sharjah.',             'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'landscape-design',   'title' => 'Contemporary Desert Garden',          'description' => 'Award-winning design combining indigenous plants, dry-river gravel beds, and architectural lighting.',               'image' => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'landscape-design',   'title' => 'Mediterranean Courtyard Design',      'description' => 'Terracotta pots, bougainvillea-draped pergola, and mosaic water feature for a villa in Yas Island.',               'image' => 'https://images.unsplash.com/photo-1600607686527-6fb886090705?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'specialized',         'title' => 'Premium Artificial Turf — Palm Villa','description' => 'High-pile synthetic grass installation for a 600 sqm garden, including drainage layer and infill.',                 'image' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=800&q=80'],
            ['category' => 'specialized',         'title' => 'Garden Lighting Masterplan',          'description' => 'Architectural LED scheme with path lights, spotlights, uplighters, and smart dimming control.',                     'image' => 'https://images.unsplash.com/photo-1518623489648-a173ef7824f3?auto=format&fit=crop&w=800&q=80'],
        ];

        foreach ($projects as $i => $p) {
            $cat = ProjectCategory::where('slug', $p['category'])->first();
            if ($cat) {
                Project::updateOrCreate(
                    ['title' => $p['title']],
                    [
                        'description'            => $p['description'],
                        'image'                  => $p['image'],
                        'project_category_id'    => $cat->id,
                        'sort_order'             => $i,
                        'is_visible_on_homepage' => $i < 9,
                    ]
                );
            }
        }

        // ─── 6. CALCULATOR OPTIONS ───────────────────────────────────────────
        $propertyTypes = [
            ['name' => 'Villa',               'value' => 1.2, 'icon' => '🏡', 'sort_order' => 0],
            ['name' => 'Townhouse',           'value' => 1.0, 'icon' => '🏘️', 'sort_order' => 1],
            ['name' => 'Apartment / Duplex',  'value' => 0.8, 'icon' => '🏢', 'sort_order' => 2],
            ['name' => 'Commercial Property', 'value' => 1.5, 'icon' => '🏬', 'sort_order' => 3],
        ];

        foreach ($propertyTypes as $pt) {
            CalculatorOption::updateOrCreate(
                ['type' => 'property_type', 'name' => $pt['name']],
                array_merge($pt, ['is_active' => true])
            );
        }

        $calcServices = [
            ['name' => 'Landscape Design',          'value' => 25,  'icon' => '🎨', 'sort_order' => 0],
            ['name' => 'Lawn Care & Maintenance',   'value' => 8,   'icon' => '🌱', 'sort_order' => 1],
            ['name' => 'Hardscaping',               'value' => 150, 'icon' => '🧱', 'sort_order' => 2],
            ['name' => 'Irrigation System',         'value' => 35,  'icon' => '💧', 'sort_order' => 3],
            ['name' => 'Pool Area Landscaping',     'value' => 200, 'icon' => '🏊', 'sort_order' => 4],
            ['name' => 'Garden Lighting',           'value' => 45,  'icon' => '💡', 'sort_order' => 5],
            ['name' => 'Artificial Grass',          'value' => 60,  'icon' => '🌿', 'sort_order' => 6],
            ['name' => 'Indoor Plant Installation', 'value' => 30,  'icon' => '🪴', 'sort_order' => 7],
        ];

        foreach ($calcServices as $cs) {
            CalculatorOption::updateOrCreate(
                ['type' => 'service', 'name' => $cs['name']],
                array_merge($cs, ['is_active' => true])
            );
        }

        // ─── 7. PAGE SECTIONS ────────────────────────────────────────────────
        $sections = [
            // Home
            [
                'section_key' => 'about_us',
                'title'       => 'Transforming Landscapes, Enriching Lives',
                'subtitle'    => 'About Us',
                'image'       => 'https://images.unsplash.com/photo-1598902108854-10e335adac99?auto=format&fit=crop&w=1200&q=80',
                'content'     => [
                    ['description' => 'At Florascape Landscape LLC, we believe outdoor spaces are living canvases waiting to be transformed into masterpieces that reflect your personality and elevate your lifestyle.'],
                    ['description' => 'Founded in 2012, our team of dedicated designers, horticulturists, and craftspeople blends deep local knowledge with modern sustainable practices to create extraordinary outdoor environments across the UAE.'],
                    ['description' => 'From intimate residential gardens to expansive commercial developments, every project receives the same meticulous attention to detail and passion for excellence.'],
                ],
                'is_active'  => true,
                'sort_order' => 1,
            ],
            [
                'section_key' => 'our_expertise',
                'title'       => 'Our Expertise',
                'subtitle'    => 'Comprehensive landscape solutions from design to ongoing maintenance',
                'content'     => [
                    ['title' => 'Pool & Water Feature Care', 'description' => 'Professional cleaning, chemical balancing, and maintenance for pristine water features year-round.',     'icon' => '💦'],
                    ['title' => 'Smart Irrigation Systems',  'description' => 'Water-efficient automated irrigation designed specifically for the UAE climate.',                          'icon' => '💧'],
                    ['title' => 'Indoor Garden Design',      'description' => 'Living walls, potted compositions, and expert horticultural care for interior spaces.',                    'icon' => '🪴'],
                    ['title' => 'Outdoor Garden Maintenance','description' => 'Comprehensive care programmes to keep your landscape healthy, vibrant, and beautiful.',                    'icon' => '🌳'],
                    ['title' => 'Hardscaping',               'description' => 'Patios, walkways, retaining walls, and pergolas that define and elevate outdoor living spaces.',          'icon' => '🧱'],
                    ['title' => 'Landscape Design',          'description' => 'End-to-end design consultancy from concept to completion, including 3D visualisation.',                   'icon' => '🎨'],
                ],
                'is_active'  => true,
                'sort_order' => 2,
            ],
            [
                'section_key' => 'cost_calculator',
                'title'       => 'Get Your Free Instant Estimate',
                'subtitle'    => 'Answer a few quick questions to see what your project might cost',
                'content'     => [
                    ['title' => 'Property Question', 'description' => 'What type of property do you have?'],
                    ['title' => 'Service Question',  'description' => 'What services are you interested in?'],
                    ['title' => 'Estimate Title',    'description' => 'Your Estimated Project Cost'],
                ],
                'is_active'  => true,
                'sort_order' => 3,
            ],
            [
                'section_key' => 'why_choose_us',
                'title'       => 'Why Choose Florascape?',
                'subtitle'    => 'A decade of trusted landscape excellence across the UAE',
                'image'       => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?auto=format&fit=crop&w=1000&q=80',
                'content'     => [
                    ['title' => 'Proven Expertise',       'description' => 'Over 10 years delivering award-winning landscape projects for residential and commercial clients.'],
                    ['title' => 'Timely Delivery',        'description' => 'We respect your schedule and commitments — projects completed on time, every time.'],
                    ['title' => 'Sustainable Practices',  'description' => 'Eco-friendly materials, water-efficient irrigation, and native planting tailored to the UAE climate.'],
                    ['title' => 'Bespoke Designs',        'description' => 'Every landscape we create is unique — tailored to your lifestyle, taste, and space.'],
                    ['title' => '24/7 Client Support',    'description' => 'Dedicated account managers and rapid-response maintenance teams at your service.'],
                    ['title' => 'Transparent Pricing',    'description' => 'No hidden costs — detailed quotations and honest communication throughout every project.'],
                ],
                'is_active'  => true,
                'sort_order' => 4,
            ],
            [
                'section_key' => 'footer_cta',
                'title'       => 'Ready to Transform Your Outdoor Space?',
                'subtitle'    => 'Book a free consultation with our expert landscape designers today.',
                'content'     => [
                    ['description' => 'Book a Free Consultation'],
                    ['description' => '/contact'],
                ],
                'is_active'  => true,
                'sort_order' => 99,
            ],
            // About
            [
                'section_key' => 'about_hero',
                'title'       => 'Our Story',
                'subtitle'    => 'Cultivating beauty, harmony, and sustainability in every outdoor space we touch.',
                'is_active'  => true,
                'sort_order' => 10,
            ],
            [
                'section_key' => 'about_story',
                'title'       => 'How It All Began',
                'subtitle'    => '"We don\'t just plant gardens — we create sanctuaries where memories are grown." — Khalid Al Mansoori, Founder',
                'image'       => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?auto=format&fit=crop&w=1000&q=80',
                'content'     => [
                    ['description' => 'Founded in 2012 by a team of passionate horticulturists and designers, Florascape began with a single vision: to reconnect the people of the UAE with the beauty and tranquillity of nature.'],
                    ['description' => 'From our first residential garden in Abu Dhabi to landmark projects across the Gulf, our approach has always combined deep horticultural expertise with artistic vision and an unwavering commitment to sustainability.'],
                    ['description' => 'Today, Florascape employs over 80 specialists and has completed more than 500 projects across the UAE, earning recognition as one of the region\'s most trusted landscape companies.'],
                ],
                'is_active'  => true,
                'sort_order' => 11,
            ],
            [
                'section_key' => 'about_values',
                'title'       => 'Our Core Values',
                'content'     => [
                    ['title' => 'Sustainability',  'description' => 'We prioritise native plants, water-efficient irrigation, and organic practices to protect our local ecosystem.'],
                    ['title' => 'Excellence',      'description' => 'We source only the healthiest plants and highest-grade materials to ensure your landscape stands the test of time.'],
                    ['title' => 'Integrity',       'description' => 'Honest communication, transparent pricing, and an unwavering commitment to doing what we promise.'],
                    ['title' => 'Innovation',      'description' => 'We continuously invest in new techniques, smart technology, and creative design to stay ahead.'],
                    ['title' => 'Community',       'description' => 'We actively participate in urban greening initiatives and give back to the communities where we work.'],
                    ['title' => 'Craftsmanship',   'description' => 'Every plant placed, every stone laid — executed with the care and precision of true artisans.'],
                ],
                'is_active'  => true,
                'sort_order' => 12,
            ],
            [
                'section_key' => 'about_team',
                'title'       => 'Meet Our Leadership Team',
                'content'     => [
                    ['title' => 'Khalid Al Mansoori', 'description' => 'Founder & CEO. 20+ years in landscape architecture and sustainable design across the Gulf region.',             'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&h=600&q=80'],
                    ['title' => 'Sarah Jenkins',      'description' => 'Creative Director. Award-winning designer specialising in contemporary desert gardens and sustainable planting.', 'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&h=600&q=80'],
                    ['title' => 'Rajesh Nair',        'description' => 'Head of Operations. Ensures every project runs on schedule, on budget, and to the highest quality standards.',    'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=600&h=600&q=80'],
                    ['title' => 'Emma Rodriguez',     'description' => 'Chief Horticulturist. Expert in native UAE flora, soil health, and integrated pest management.',                   'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&h=600&q=80'],
                    ['title' => 'Ahmed Hassan',       'description' => 'Senior Irrigation Engineer. Designs water-saving systems that reduce consumption by up to 40%.',                   'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&h=600&q=80'],
                    ['title' => 'Priya Sharma',       'description' => 'Client Relations Manager. Your dedicated point of contact from first consultation to project completion.',          'image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&h=600&q=80'],
                ],
                'is_active'  => true,
                'sort_order' => 13,
            ],
            // Services
            [
                'section_key' => 'services_hero',
                'title'       => 'Design. Build. Maintain.',
                'subtitle'    => 'Comprehensive landscaping solutions — from initial concept through to long-term care',
                'is_active'  => true,
                'sort_order' => 20,
            ],
            // Portfolio
            [
                'section_key' => 'portfolio_hero',
                'title'       => 'Our Project Gallery',
                'subtitle'    => 'Explore 500+ completed projects — from private residential oases to landmark commercial landscapes across the UAE.',
                'is_active'  => true,
                'sort_order' => 30,
            ],
            // Contact
            [
                'section_key' => 'contact_hero',
                'title'       => 'Let\'s Create Something Beautiful',
                'subtitle'    => 'Reach out for a free consultation, a detailed quote, or simply to talk about your vision.',
                'is_active'  => true,
                'sort_order' => 40,
            ],
            [
                'section_key' => 'contact_info',
                'title'       => 'Get In Touch',
                'subtitle'    => 'Our team is available Saturday to Thursday, 8am – 6pm.',
                'content'     => [
                    ['title' => 'Address', 'description' => "Plot 12, Al Quoz Industrial Area 3\nDubai, United Arab Emirates"],
                    ['title' => 'Phone',   'description' => '+971 50 123 4567'],
                    ['title' => 'Email',   'description' => 'info@florascape.ae'],
                    ['title' => 'Hours',   'description' => "Sat – Thu: 8:00 am – 6:00 pm\nFriday: Closed"],
                ],
                'is_active'  => true,
                'sort_order' => 41,
            ],
            [
                'section_key' => 'contact_map',
                'title'       => 'Find Us',
                'subtitle'    => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462560.5358534093!2d54.94741!3d25.0760836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295523!2sDubai!5e0!3m2!1sen!2sae!4v1700000000000!5m2!1sen!2sae',
                'is_active'  => true,
                'sort_order' => 42,
            ],
        ];

        foreach ($sections as $s) {
            PageSection::updateOrCreate(['section_key' => $s['section_key']], $s);
        }

        $this->command->info('✅ Florascape demo content seeded successfully.');
        $this->command->info('   → ' . Service::count() . ' services');
        $this->command->info('   → ' . ProjectCategory::count() . ' project categories');
        $this->command->info('   → ' . Project::count() . ' projects');
        $this->command->info('   → ' . PageSection::count() . ' page sections');
        $this->command->info('   → ' . CalculatorOption::count() . ' calculator options');
    }
}
