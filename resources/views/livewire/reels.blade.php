<div class="lg:px-8 flex flex-col h-full my-auto overflow-hidden">

    <ul class=" h-[calc(100vh_-_1rem)] my-auto flex flex-col gap-y-7 snap-y snap-mandatory overflow-x-hidden">

        @foreach ($posts as $post )
            
        @php
            $cover= $post->media()->first();
        @endphp
       
        <li class="h-[calc(100vh_-_5rem)] m-auto max-w-sm mx-auto w-full cursor-pointer rounded-lg relative group shrink-0
                  snap-center snap-always grid grid-cols-12 gap-4
        ">


        {{-- main --}}


        <div class="col-span-11 bg-black border">

            <x-video :controls="true" :cover="false"  source="{{$cover->url}}" />
        
        </div>

        {{-- actions --}}

        <div class="col-span-1 flex flex-col gap-y-8 items-center justify-end">


            <div class="flex flex-col gap-y-1 items-center">

            @if ($post->isLikedBy(auth()->user()))
            <button wire:click='togglePostLike({{$post->id}})'>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-8 h-8 text-rose-500">
                    <path
                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                </svg>
            </button>

            @else
            <button wire:click='togglePostLike({{$post->id}})'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                    stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>

            </button>
            @endif

            <h6 class="text-sm">{{$post->likers->count()}}</h6>
            </div>




            @if ($post->allow_commenting)
            <div class="flex flex-col gap-y-1 items-center">
            {{-- comment --}}
            <button
                onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{$post->id}}}})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                </svg>

                
            </button>

            <h6 class="text-sm">{{$post->comments->count()}}</h6>
            </div>

            @endif

            {{-- forward --}}
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-send w-5 h-5" viewBox="0 0 16 16">
                    <path
                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                </svg>
            </span>

            {{-- Bookmark/favorites --}}
            <span class="-ml-px">

                @if ($post->hasBeenFavoritedBy(auth()->user()))

                <button wire:click='toggleFavorite({{$post->id}})'>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z"
                            clip-rule="evenodd" />
                    </svg>
                </button>


                @else
                <button wire:click='toggleFavorite({{$post->id}})'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                </button>
                @endif


            </span>


            {{-- settings --}}
            <span>


                
            </span>
        </div>

        </li>
        @endforeach

    </ul>
</div>
