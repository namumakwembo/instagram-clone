<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Notifications\MessageSentNotification;
use Livewire\Attributes\On;
use Livewire\Component;

class Chat extends Component
{


    public Conversation $conversation;


    public $receiver;
    public $body;

    public $loadedMessages;
    public $paginate_var= 10;


    function listenBroadcastedMessage($event)  {

       // dd('reached');

        $this->dispatch('scroll-bottom');

        $newMessage= Message::find($event['message_id']);



        #push message

        $this->loadedMessages->push($newMessage);

        #mark as read

        $newMessage->read_at= now();
        $newMessage->save();
        
    }


    function sendMessage()  {

        $this->validate(['body'=>'required|string']);


        $createdMessage= Message::create([
            'conversation_id'=>$this->conversation->id,
            'sender_id'=>auth()->id(),
            'receiver_id'=>$this->receiver->id,
            'body'=>$this->body
        ]);

        #scroll to bottom
        $this->dispatch('scroll-bottom');

        $this->reset('body');

        #push the message
        $this->loadedMessages->push($createdMessage);


        #update the conversation model - for sorting in chatlist
        $this->conversation->updated_at=now();
        $this->conversation->save();

        #dispatch event 'refresh ' to chatlist 
        $this->dispatch('refresh')->to(ChatList::class);

        #broadcast new message

        $this->receiver->notify(new MessageSentNotification(
            auth()->user(),
            $createdMessage,
            $this->conversation
        ));





        
    }



    #[On('loadMore')]
    function loadMore()  {

        //dd('reached');

        #increment
        $this->paginate_var +=10;

        #call loadMessage
        $this->loadMessages();

        #dispatch event- update height
        $this->dispatch('update-height');
        
    }


    function loadMessages()  {

         #get count
         $count= Message::where('conversation_id',$this->conversation->id)->count();

         #skip and query

         $this->loadedMessages= Message::where('conversation_id',$this->conversation->id)
                                ->skip($count- $this->paginate_var)
                                ->take($this->paginate_var)
                                ->get();

          return $this->loadedMessages;


    }

    function mount()  {

        $this->receiver= $this->conversation->getReceiver();

        $this->loadMessages();

        

    }

    public function render()
    {
        return view('livewire.chat.chat');
    }
}
