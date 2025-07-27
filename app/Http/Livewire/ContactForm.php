<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name, $email, $message;

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);

        // You can save or email the data here
        session()->flash('success', 'Thanks for contacting us!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
