<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CarouselComponent extends Component
{
       public $slides = [];

    public function mount()
    {
       $this->slides = [
            [
                'image' => 'https://images.unsplash.com/photo-1599443649200-5771d1b7d52f',
                'title' => 'Transform Your Outdoors into a Luxury Oasis',
                'description' => 'Premium Landscaping & Pool Solutions in the UAE | Residential & Commercial Projects',
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1600052446470-6a18b8e891cf',
                'title' => 'Design. Build. Inspire.',
                'description' => 'Crafting sustainable outdoor experiences tailored to your needs.',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.carousel-component');
    }
}
