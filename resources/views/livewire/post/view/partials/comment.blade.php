<div wire:key="comment-{{$comment->id}}" class="flex items-center gap-3 py-2">
    <x-avatar wire:ignore   src="https://source.unsplash.com/500x500?face-{{rand(1,10)}}" class="h-9 w-9 mb-auto" />

    <div class="grid grid-cols-7 w-full gap-2">

        {{-- comment  --}}
        <div class="col-span-6 flex flex-wrap text-sm">

            <p>
                <span class="font-bold text-sm"> {{$comment->user->name}} </span>
                {{$comment->body}}
            </p>
        </div>


        {{-- like --}}
        <div class="col-span-1 flex text-right justify-end mb-auto">
            
            <button class="font-bold text-sm ml-auto">
                {{-- svg --}}
                @if ($comment->isLikedBy(auth()->user()))
                <span wire:click='toggleCommentLike({{$comment->id}})'>
    
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 text-rose-500">
                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                  </svg>
                </span>
                  
                @else
                <span wire:click='toggleCommentLike({{$comment->id}})'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                        stroke="currentColor" class="w-3 h-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
    
                </span> 
                @endif
                  
            </button>


        </div>


        {{-- footer --}}
        <div class="col-span-7 flex gap-2 text-sm items-center text-gray-700">

            <span> {{$comment->created_at->diffForHumans()}}</span>
            <span class="font-bold">
                @if ($comment->totalLikers>0 && !$comment->hide_like_view)
                {{$comment->totalLikers}} {{$comment->totalLikers>1? 'likes':'like'}}
               @endif
               
            </span>
            <button wire:click="setParent({{$comment->id}})" class="font-semibold">Reply</button>

        </div>
    </div>


</div>