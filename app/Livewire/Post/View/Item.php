<?php

namespace App\Livewire\Post\View;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class Item extends Component
{

    public Post $post;

    public $body;
    public $parent_id=null;

    function togglePostLike()  {

        abort_unless(auth()->check(),401);

        auth()->user()->toggleLike($this->post);        
    }

    function toggleCommentLike(Comment $comment)  {

        abort_unless(auth()->check(),401);

        auth()->user()->toggleLike($comment);        
    }

    function addComment()  {

        $this->validate(['body'=>'required']);

        #create comment 
        Comment::create([
            'body'=>$this->body,
            'parent_id'=>$this->parent_id,
            'commentable_id'=>$this->post->id,
            'commentable_type'=>Post::class,
            'user_id'=>auth()->id(),

        ]);

        $this->reset('body');

        
    }


    function setParent(Comment $comment)  {

        $this->parent_id=$comment->id;
        $this->body="@".$comment->user->name;
        
    }

    public function render()
    {

        $comments = $this->post->comments()->whereDoesntHave('parent')->get();
        return view('livewire.post.view.item',['comments'=>$comments]);
    }
}
