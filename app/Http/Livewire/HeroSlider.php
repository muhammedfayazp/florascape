<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Slider;

class HeroSlider extends Component
{
      public $slides = [];

    public function mount()
    {
        // Fetch homepage slides from database
        $slider = Slider::where('type', 'heroslider')->first();
        $this->slides = $slider?->slides ?? [];
    }

    public function render()
    {
        return view('livewire.hero-slider');
    }
}
