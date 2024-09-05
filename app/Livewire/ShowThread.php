<?php

namespace App\Livewire;

use App\Models\Thread;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowThread extends Component
{
    public Thread $thread;
    public string $body;

    public function postReply()
    {
//        validate
        $this->validate(['body'=>'required']);
//        create
        auth()->user()->replies()->create([
            'thread_id' => $this->thread->id,
            'body' => $this->body,
        ]);
//        refresh
        $this->body = '';
//        TODO: Revisar, se limpia el atributo pero no se borra el texto del input
//        $this->reset('body');
//        Log::debug($this->body);

    }

    function render(){
        $replies = $this->thread->replies()->whereNull('reply_id')->get();
        return view('livewire.show-thread',compact('replies'));
    }
}
