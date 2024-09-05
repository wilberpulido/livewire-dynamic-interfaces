<?php

namespace App\Livewire;

use App\Models\Reply;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ShowReply extends Component
{
    use authorizesRequests;

    public Reply $reply;
    public string $body;
    public bool $is_creating = false;
    public bool $is_editing = false;
//    prueba con emitSelf de livewire v2
//    protected $listeners = ['refresh' => '$refresh'];
    public function postReply()
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
    public function updatedIsEditing($is_editing)
    {
//        No da ni si quiera el acceso al formulario
        $this->authorize('update', $this->reply);
//        Se puede debuggear aca
//        dd($is_editing);
        $this->is_creating = false;
        $this->body =  $this->reply->body;
    }
    public function updatedIsCreating()
    {
        $this->is_editing = false;
        $this->body = '';
    }
    public function updateReply()
    {
        $this->authorize('update', $this->reply);
//      validate
        $this->validate(['body'=>'required']);
//        create
        $this->reply->update(['body' => $this->body,]);
//        refresh
        $this->is_editing = false;

    }
    public function render()
    {
        return view('livewire.show-reply');
    }
}
