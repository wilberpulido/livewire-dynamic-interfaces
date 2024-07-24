<?php

namespace App\Livewire;


use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowThreads extends Component
{
    public function render()
    {
        $categories = Category::get();
        return view('livewire.show-threads',compact('categories'));
    }
}
