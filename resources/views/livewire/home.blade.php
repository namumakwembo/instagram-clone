<div x-data="{

  canLoadMore:@entangle('canLoadMore')

}" @scroll.window.trottle="

  scrollTop= window.scrollY ||window.scrollTop;
  divHeight= window.innerHeight||document.documentElement.clientHeight;
  scrollHeight = document.documentElement.scrollHeight;


  isScrolled= scrollTop+ divHeight >= scrollHeight-1;

  {{-- Check if user can load more  --}}

  if(isScrolled && canLoadMore){

    @this.loadMore();
  }


" class="w-full h-full">

  {{-- Header --}}
  <header class="md:hidden sticky top-0 z-50 bg-white">

    <div class="grid grid-cols-12 gap-2 items-center">

      <div class="col-span-3">

        <img src="{{asset('assets/logo.png')}}" class="h-12 max-w-lg w-full" alt="logo">

      </div>

      <div class="col-span-8 flex justify-center px-2">

        <input type="text" placeholder="Search"
          class=" border-0 outline-none w-full focus:outline-none bg-gray-100 rounded-lg focus:ring-0 hover:ring-0">

      </div>

      <div class="col-span-1 flex justify-center">

        <a href="#">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>

          </span>
        </a>

      </div>


    </div>




  </header>


  {{-- main --}}

  <main class="grid lg:grid-cols-12 gap-8 md:mt-10 ">

    <aside class="lg:col-span-8   overflow-hidden  ">

      {{-- Stories --}}
      <section>
        <ul class="flex overflow-x-auto scrollbar-hide items-center gap-2">

          @for ($i = 0; $i < 10; $i++) <li class="flex flex-col justify-center w-20 gap-1 p-2">
            <x-avatar wire:ignore story src="https://source.unsplash.com/500x500?face-{{$i}}" class="h-14 w-14" />
            <p class="text-xs font-medium truncate" wire:ignore> {{fake()->name}} </p>
            </li>
            @endfor
        </ul>

      </section>

      {{-- posts --}}
      <section class="mt-5 space-y-4 p-2">


        @if ($posts)

        @foreach ($posts as $post)

        <livewire:post.item wire:key="post-{{$post->id}}" :post="$post" />

        @endforeach

        @else

        <p class="font-bol flex justify-center">No posts</p>

        @endif

      </section>


    </aside>


    {{-- sugestions --}}
    <aside class="lg:col-span-4   hidden lg:block p-4">

      <div class="flex items-center gap-2">

        <x-avatar wire:ignore src="https://source.unsplash.com/500x500?face" class="w-12 h-12" />
        <h4 class="font-medium" wire:ignore>{{fake()->name}} </h4>

      </div>

      {{-- suggesstions --}}
      <section class="mt-4">

        <h4 class="font-bold text-gray-700/95">Suggestions for you </h4>

        <ul class="my-2 space-y-3">

          @foreach ($suggestedUsers as $key=> $user)

          <li class="flex items-center gap-3">
            <a  href="{{route('profile.home',$user->username)}}" >
              <x-avatar wire:ignore src="https://source.unsplash.com/500x500?face-{{$key}}" class="w-12 h-12" />
            </a>

            <div class="grid grid-cols-7 w-full gap-2">
              <div class="col-span-5">
                <a href="{{route('profile.home',$user->username)}}" class="font-semibold truncate text-sm">{{$user->name}}</a>
                <p class="text-xs truncate" wire:ignore> Followed by {{fake()->name}} </p>
              </div>

              <div class="col-span-2 flex text-right justify-end">

                @if (auth()->user()->isFollowing($user))
                <button wire:click="toggleFollow({{$user->id}})" class="font-bold text-blue-500 ml-auto text-sm">Following</button>
                    
                @else
                <button wire:click="toggleFollow({{$user->id}})" class="font-bold text-blue-500 ml-auto text-sm">Follow</button>
                    
                @endif

              </div>

            </div>

          </li>
          @endforeach

        </ul>

      </section>


      {{-- App links --}}

      <section class="mt-10">

        <ol class="flex gap-2 flex-wrap">

          <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline">About</a></li>
          <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline">Help</a></li>
          <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline">API</a></li>
          <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline">Jobs</a></li>
          <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline">Privacy</a></li>
          <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline">Terms</a></li>
          <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline">Locations</a></li>
          <li class="text-xs text-gray-800/90 font-medium"><a href="#" class="hover:underline">About</a></li>

        </ol>

        <h3 class="text-gray-800/90 mt-6 text-sm"> @ 2023 INTAGRAM COURSE </h3>


      </section>



    </aside>


  </main>

</div>