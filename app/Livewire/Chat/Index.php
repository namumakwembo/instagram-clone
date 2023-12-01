<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return <<<'HTML'
        <div class="w-full h-[calc(100vh_-_0.0rem)] flex bg-white rounded-lg">

            <!-- chatlist -->
            <div class="relative w-full h-full md:w-[320px]  xl:w-[400px] border-r shrink-0 overflow-y-auto">


              <livewire:chat.chat-list />

            </div>


            <main class="hidden md:grid w-full h-full relative overflow-y-auto" style="contain:content">

                    <div class="m-auto text-center justify-center flex gap-3 flex-col items-center col-span-12">
                        <!-- Message icon -->
                        <span class="m-auto">
                        <svg class="w-14 h-14 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z" />
                         </svg>

                        </span>

                        <h4 class="font-medium text-lg">Send private photos and messages</h4>


                    </div>

            </main>


        </div>
        HTML;
    }
}
