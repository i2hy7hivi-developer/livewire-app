<?php

namespace App\Livewire;

use Livewire\Component;

class FirstComponent extends Component
{
    public $name = 'John Doe';
    public $age = 30;

    public function mount()
    {
        // This method is called when the component is initialized
        $this->name = 'Jane Doe';
        $this->age = 25;
    }

    public function render()
    {
        return view('livewire.first-component');
    }
}
