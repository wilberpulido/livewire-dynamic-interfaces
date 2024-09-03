<?php

namespace App\Livewire;


use App\Models\Category;
use App\Models\Thread;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowThreads extends Component
{
    public $search = '';
    public $category_id = '';

    public function setFilterByCategoryId($category_id) : void
    {
        $this->category_id = $category_id;
    }

    public function render()
    {
        $categories = Category::get();
        $threadsQuery = Thread::query();
        $threadsQuery->where('title', 'like', '%' . $this->search . '%');
        if ($this->category_id) {
            $threadsQuery->where('category_id', $this->category_id);
        }
        $threadsQuery->withCount('replies');
        $threadsQuery->latest();
        $threads = $threadsQuery->get();
        return view('livewire.show-threads',compact('categories','threads'));
    }
}
