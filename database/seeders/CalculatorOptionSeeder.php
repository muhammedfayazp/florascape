<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CalculatorOption;

class CalculatorOptionSeeder extends Seeder
{
    public function run(): void
    {
        $propertyTypes = [
            ['name' => 'Villa', 'value' => 1.2, 'icon' => '🏡'],
            ['name' => 'Apartment', 'value' => 0.8, 'icon' => '🏢'],
            ['name' => 'Townhouse', 'value' => 1.0, 'icon' => '🏘️'],
            ['name' => 'Commercial Property', 'value' => 1.5, 'icon' => '🏬'],
        ];

        foreach ($propertyTypes as $index => $type) {
            CalculatorOption::updateOrCreate(
                ['type' => 'property_type', 'name' => $type['name']],
                ['value' => $type['value'], 'icon' => $type['icon'], 'sort_order' => $index, 'is_active' => true]
            );
        }

        $services = [
            ['name' => 'Landscape Design', 'value' => 25, 'icon' => '🎨'],
            ['name' => 'Lawn Care & Maintenance', 'value' => 8, 'icon' => '🌱'],
            ['name' => 'Hardscaping (Patios, Walkways)', 'value' => 150, 'icon' => '🧱'],
            ['name' => 'Irrigation System', 'value' => 35, 'icon' => '💧'],
            ['name' => 'Pool Area Landscaping', 'value' => 200, 'icon' => '🏊'],
            ['name' => 'Garden Lighting', 'value' => 45, 'icon' => '💡'],
        ];

        foreach ($services as $index => $service) {
            CalculatorOption::updateOrCreate(
                ['type' => 'service', 'name' => $service['name']],
                ['value' => $service['value'], 'icon' => $service['icon'], 'sort_order' => $index, 'is_active' => true]
            );
        }
    }
}
