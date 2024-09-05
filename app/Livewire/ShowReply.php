<?php

namespace App\Livewire;

use App\Models\Reply;
use Livewire\Component;

class ShowReply extends Component
{
    public Reply $reply;
    public string $body;
    public bool $is_creating = false;
//    prueba con emitSelf de livewire v2
//    protected $listeners = ['refresh' => '$refresh'];
    public function postChildReply()
    {
        if(!is_null($this->reply->reply_id)) return;
//        validate
        $this->validate(['body'=>'required']);
//        create
        auth()->user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,
            'body' => $this->body,
        ]);
//        refresh
        $this->is_creating = false;
        $this->body = '';
//        TODO: Revisar, se limpia el atributo pero no se borra el texto del input
//        $this->reset('body');
//        Log::debug($this->body);
//        livewire v2
//        $this->emitSelf('refresh');
//        livewire v3 (Se refresca sin ejecutar esto)
//        $this->dispatch('refresh')->self();

    }
    public function render()
    {
        return view('livewire.show-reply');
    }
}
