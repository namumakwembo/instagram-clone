<?php

namespace App\Notifications;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageSentNotification extends Notification  implements ShouldBroadcastNow
{

    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public User $user,
        public Message $message,
        public Conversation $conversation

    )
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast'];
    }

  

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user_id'=>$this->user->id,
            'message_id'=>$this->message->id,
            'conversation_id'=>$this->conversation->id

        ];
    }
}
