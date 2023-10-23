<div class="grid lg:grid-cols-12 gap-3 h-full w-full overflow-hidden">

    <aside class=" hidden lg:flex lg:col-span-7 m-auto items-center w-full overflow-scroll">


        {{-- Css snap scroll --}}
        <div
            class="relative flex overflow-x-scroll overscroll-contain w-[500px] selection:snap-x snap-mandatory gap-2 px-2">


            @foreach ($post->media as $key =>$file)

            <div class="w-full h-full shrink-0 snap-always snap-center">

                @switch($file->mime)
                @case('video')

                <x-video source="{{$file->url}}" />

                @break
                @case('image')

                <img src="{{$file->url}}" alt="image" class="h-full w-full block object-scale-down">

                @break
                @default

                @endswitch

            </div>

            @endforeach



        </div>

    </aside>

    <aside class="lg:col-span-5 h-full scrollbar-hide relative flex gap-4 flex-col overflow-hidden overflow-y-scroll">

        <header class="flex  items-center gap-3 border-b py-2  sticky  top-0 bg-white z-10 ">

            <x-avatar wire:ignore story src="https://source.unsplash.com/500x500?face-{{rand(1,10)}}" class="h-9 w-9" />

            <div class="grid grid-cols-7 w-full gap-2">

                <div class="col-span-5">
                    <h5 class="font-semibold truncate text-sm">{{$post->user->name}} </h5>
                </div>

                <div class="flex col-span-2 text-right justify-end">

                    <button wire:click="$dispatch('closeModal')" class="text-gray-500 ml-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>


                    </button>

                </div>




            </div>

        </header>

        <main>

            @if ($comments)

            @foreach ($comments as $comment)
            
            <section class="flex flex-col gap-2">

                {{-- main comment --}}
                @include('livewire.post.view.partials.comment')

                @if ($comment->replies)
                    
                    @foreach ($comment->replies as $reply )
                            
                        {{-- Reply --}}
                        @include('livewire.post.view.partials.reply')
                    @endforeach

                @endif

                
            </section>
            @endforeach

            @else

            No comments
                
            @endif
        </main>

        {{-- footer --}}
        <footer class="mt-auto sticky border-t bottom-0 z-10 bg-white">

            {{-- actions --}}
            <div class="flex gap-4 items-center my-2">

                {{-- heart --}}
                @if ($post->isLikedBy(auth()->user()))
                <button wire:click='togglePostLike()'>
    
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-rose-500">
                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                  </svg>
                </button>
                  
                @else
                <button wire:click='togglePostLike()'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
    
                </button> 
                @endif
    
                @if ($post->allow_commenting)
                    
                {{-- comment --}}
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                    </svg>

                </span>
                @endif

                {{-- forward --}}
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-send w-5 h-5" viewBox="0 0 16 16">
                        <path
                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                    </svg>
                </span>

                {{-- Bookmark --}}
                <span class="ml-auto">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>

                </span>

            </div>

            {{-- likes and views --}}
            @if ($post->totalLikers>0 && !$post->hide_like_view)
            <p class="font-bold text-sm">{{$post->totalLikers}} {{$post->totalLikers>1? 'likes':'like'}}</p>
            @endif

            {{-- name and comment --}}
            <div class="flex text-sm gap-2 font-medium">
                <p> <strong class="font-bold">{{$post->user->name}} </strong>
                    {{$post->description}}
                </p>
            </div>

            @if ($post->allow_commenting)
                
            {{-- view post modal --}}
            <button

                class="text-slate-500/90 text-sm font-medium"> Total {{$post->comments->count()}} comments </button>

            {{-- leave comment --}}
            <form 
            wire:key="{{time()}}"
            x-data="{body:@entangle('body')}"
            @submit.prevent="$wire.addComment()"
             class="grid grid-cols-12 items-center w-full">
                @csrf

                <input x-model="body" type="text" placeholder=" Leave a comment "
                    class="border-0 col-span-10 placeholder:text-sm outline-none focus:outline-none px-0 rounded-lg hover:ring-0 focus:ring-0">
                <div class="col-span-1 ml-auto flex justify-end text-right">
                    <button type="submit" x-cloak x-show="body.length >0"
                        class="text-sm font-semibold flex justify-end text-blue-500">
                        Post
                    </button>
                </div>

                <span class="col-span-1 ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                    </svg>
                </span>

            </form>
            @endif

        </footer>







    </aside>

</div>