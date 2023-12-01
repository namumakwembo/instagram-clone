<div class="flex flex-col transition-all h-full overflow-hidden">

    <header class="px-3 z-10 bg-white sticky top-0 w-full py-2 sm:pt-12">

        {{-- Title/name and Icon --}}
        <section class=" justify-between flex items-center pb-2">

            <div class="flex items-center gap-2 truncate">
                 <h5 class="font-[900] text-2xl">{{auth()->user()->name}}</h5>
            </div>

             <button>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                  
                  
                

             </button>

        </section>

        {{-- Filters --}}
        <section class="  gap-3 grid grid-cols-3 items-center mt-1 overflow-x-scroll p-2 bg-white">

            <button class="font-semibold flex justify-center text-black border-b-2 border-black pb-2">
                 Primary
            </button>
            <button class="font-semibold flex justify-center pb-2 text-gray-500">
                General
             </button>
             <button class="font-semibold flex justify-center pb-2 text-gray-500">
                Requests
             </button>
          
        </section>

    </header>


    <main class=" overflow-y-scroll overflow-hidden grow  h-full relative " style="contain:content">

        {{-- chatlist  --}}
        <ul class="p-2 grid w-full spacey-y-2">

            {{-- Chat list item --}}
            <li class="py-3 hover:bg-gray-50 rounded-2xl dark:hover:bg-gray-700/70 transition-colors duration-150 flex gap-4 relative w-full cursor-pointer px-2">
                
                <a href="#" class="shrink-0">
                    <x-avatar wire:ignore  src="https://source.unsplash.com/500x500?face-{{rand(0,10)}}"  class="w-12 h-12" />
                </a>

                <aside class="grid grid-cols-12 w-full">


                    <a href="#" class="col-span-10 border-b pb-2 border-gray-200 relative overflow-hidden truncate leading-5 w-full flex-nowrap p-1">


                        {{-- name--}}
                        <div class="flex justify-between mb-1 w-full items-center">
                            <h6 class="truncate   font-normal  text-gray-900">
                                John Doe
                            </h6>

                        </div>

                        {{-- Message body --}}
                        <div class="flex gap-x-2 items-center">
                            
                            {{-- Only show if AUTH is onwer of message --}}
                            <span class="font-bold text-xs">
                                You:
                            </span>

                             <p class="  truncate text-xs font-[100]">
                                Lorem Lorem Lorem Lorem 
                             </p>

                             <span class="font-medium px-1 text-xs shrink-0  text-gray-800   ">5m</span>


                        </div>

                    </a>

                    {{-- Read status --}}
                    {{-- Only show if AUTH is NOT onwer of message --}}
                    <div class="col-span-2 flex flex-col text-center my-auto">

                        {{-- Dots icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dot w-10 h-10 text-blue-500" viewBox="0 0 16 16">
                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                          </svg>
                     
                    </div>


                </aside>

            </li>
            

        </ul>

    </main>
</div>
