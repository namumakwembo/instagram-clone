<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class Main extends Component
{
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
               
              <livewire:chat.chat />

            </main>


        </div>
        HTML;
    }
}
