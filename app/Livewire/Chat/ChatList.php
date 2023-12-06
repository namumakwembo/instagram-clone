<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class ChatList extends Component
{

    protected $listeners=['refresh'=>'$refresh'];

    public function render()
    {

        $conversations = auth()->user()->conversations()->latest('updated_at')->get();
        return view('livewire.chat.chat-list',['conversations'=>$conversations]);
    }
}
