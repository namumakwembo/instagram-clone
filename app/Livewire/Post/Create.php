<?php

namespace App\Livewire\Post;

use LivewireUI\Modal\ModalComponent;


class Create extends ModalComponent
{


    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '4xl';
    }




    public function render()
    {
        return view('livewire.post.create');
    }
}
