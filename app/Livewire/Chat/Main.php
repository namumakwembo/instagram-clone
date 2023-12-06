<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use Livewire\Component;

class Main extends Component
{


  public $chat;

  public $conversation;



  function mount()  {


    $this->conversation= Conversation::findOrFail($this->chat);


    #mark messages belonging to receiver as read

    Message::where('conversation_id',$this->conversation->id)
             ->where('receiver_id',auth()->id())
             ->whereNull('read_at')
             ->update(['read_at'=>now()]);
    
  }



    public function render()
    {
        return <<<'HTML'
        <div class="w-full h-[calc(100vh_-_0.0rem)] flex bg-white rounded-lg">

            <!-- chatlist -->
            <div class=" hidden lg:flex  relative w-full h-full md:w-[320px]  xl:w-[400px] border-r shrink-0 overflow-y-auto">


              <livewire:chat.chat-list />

            </div>


            <main class="grid w-full h-full relative overflow-y-auto" style="contain:content">

              <!-- chat component  -->
               
              <livewire:chat.chat :conversation="$conversation" />

            </main>


        </div>
        HTML;
    }
}
