<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // Post::factory(2)->hasComments(rand(12,30))->create(['type'=>'reel']);
        // Post::factory(12)->hasComments(rand(12,30))->create(['type'=>'post']);


        // //create comment replies 

        // Comment::limit(50)->each(function($comment){


        //     $comment::factory(rand(1,5))->isReply($comment->commentable)->create(['parent_id'=>$comment->id]);

        // });


      Post::factory()->hasComments(1)->create(['type'=>'post']);

      $post=  Post::factory()->hasComments(1)->create(['type'=>'post']);


      //Create nested comments 
      $parentComment= $post->comments->first();

      for ($i=0; $i <  10; $i++) { 

        $nestedComment= Comment::factory()->isReply($parentComment->commentable)->create(['parent_id'=>$parentComment->id]);
        $parentComment= $nestedComment;//set the new comment as the parent for the next iteration
      }




    }
}
