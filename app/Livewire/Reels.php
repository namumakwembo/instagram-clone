<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Reels extends Component
{


    #[On('closeModal')]
    function reverUrl()
    {
        $this->js("history.replaceState({},'','/reels')");
    }

 
    function togglePostLike(Post $post)  {

        abort_unless(auth()->check(),401);

        auth()->user()->toggleLike($post);        
    }


    function toggleFavorite(Post $post)  {

        abort_unless(auth()->check(),401);
        auth()->user()->toggleFavorite($post);        
    }

    public function render()
    {

        $posts= Post::limit(20)->where('type','reel')->get();
        return view('livewire.reels',['posts'=>$posts]);
    }
}
