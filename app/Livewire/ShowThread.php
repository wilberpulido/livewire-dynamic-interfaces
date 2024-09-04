<?php

namespace App\Livewire;

use App\Models\Thread;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowThread extends Component
{
    public Thread $thread;
    public $body;

    public function postReply()
    {
//        validate
        Log::debug('$this->body');
        Log::debug($this->body);
        $this->validate(['body'=>'required']);
//        create
        auth()->user()->replies()->create([
            'thread_id' => $this->thread->id,
            'body' => $this->body,
        ]);
//        refresh
        $this->body = '';
    }

}
