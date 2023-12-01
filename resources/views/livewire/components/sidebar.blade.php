<div x-data="{
    shrink:@entangle('shrink'),
    drawer:@entangle('drawer'),
    showSearch:false,
    showNotifications:false,

}" 

x-init="
 $wire.shrink={{request()->routeIs('chat')|| request()->routeIs('chat.main')}}
"

class="menu p-3   w-20  h-full grid bg-white border-r text-base-content" :class="{'w-72 ':!shrink}">

    {{--Logo--}}
    <div class="pt-3">

        <div x-show="shrink || drawer" class="w-full px-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-instagram w-6 h-6" viewBox="0 0 16 16">
                <path
                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
            </svg>
        </div>

        <img x-cloak x-show="!(shrink ||drawer)" src="{{asset('assets/logo.png')}}" class="h-16 w-44 text-black"
            alt="logo">
    </div>

    {{-- Side content --}}
    <ul class="space-y-4 mt-2">

        <li><a wire:navigate href="/" class="flex items-center gap-5 ">

                <span>

                    @if (request()->routeIs('Home'))
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                        <path
                            d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path
                            d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                    @else


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>

                    @endif





                </span>

                <h4 x-cloak x-show="!(shrink||drawer)"
                    class=" text-lg  {{request()->routeIs('Home')?'font-bold':'font-medium'}}">Home</h4>
            </a></li>

        <li>
            <div @click="showSearch=true;showNotifications=false;drawer=true" class="flex items-center gap-5">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z"
                            clip-rule="evenodd" />
                    </svg>


                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Search</h4>
            </div>
        </li>


        <li><a wire:navigate href="{{route('explore')}}" class="flex items-center gap-5">

                <span>

                    @if (request()->routeIs('explore'))
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24zm-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
                    </svg>

                    @else
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                        <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z" />
                    </svg>

                    @endif






                </span>

                <h4 x-cloak x-show="!(shrink||drawer)"
                    class=" {{request()->routeIs('explore')?'font-bold':'font-medium'}} text-lg ">Explore</h4>
            </a></li>


        <li><a wire:navigate href="{{route('reels')}}" class="flex items-center gap-5">

                <span>

                    @if (request()->routeIs('reels'))

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                        id="instagram-reel">
                        <path fill="#000" fill-rule="evenodd"
                            d="M12.6126 1H8.72076L8.94868 1.68377L10.7208 7H14.6126L13.0513 2.31623L12.6126 1ZM15.9766 9C15.9921 9.00036 16.0076 9.00036 16.0231 9H23V17.5C23 20.5376 20.5376 23 17.5 23H6.5C3.46243 23 1 20.5376 1 17.5V9H9.97665C9.99208 9.00036 10.0076 9.00036 10.0231 9H15.9766ZM16.7208 7L14.9487 1.68377L14.7208 1H17.5C20.5376 1 23 3.46243 23 6.5V7H16.7208ZM6.5 1H6.61257L7.05132 2.31623L8.61257 7H1V6.5C1 3.46243 3.46243 1 6.5 1ZM10.0735 10.1808C9.76799 9.96694 9.36892 9.94083 9.03819 10.113C8.70746 10.2852 8.5 10.6271 8.5 11V18C8.5 18.3729 8.70746 18.7148 9.03819 18.887C9.36892 19.0592 9.76799 19.0331 10.0735 18.8192L15.0735 15.3192C15.3408 15.1321 15.5 14.8263 15.5 14.5C15.5 14.1737 15.3408 13.8679 15.0735 13.6808L10.0735 10.1808Z"
                            clip-rule="evenodd"></path>
                    </svg>
                    @else

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="24" height="24" fill="currentColor"
                        id="instagram-reel">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M1 6.5A5.5 5.5 0 0 1 6.5 1h11A5.5 5.5 0 0 1 23 6.5v11a5.5 5.5 0 0 1-5.5 5.5h-11A5.5 5.5 0 0 1 1 17.5v-11ZM6.5 3A3.5 3.5 0 0 0 3 6.5v11A3.5 3.5 0 0 0 6.5 21h11a3.5 3.5 0 0 0 3.5-3.5v-11A3.5 3.5 0 0 0 17.5 3h-11Z"
                            clip-rule="evenodd"></path>
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M9.038 10.113a1 1 0 0 1 1.035.068l5 3.5a1 1 0 0 1 0 1.638l-5 3.5A1 1 0 0 1 8.5 18v-7a1 1 0 0 1 .538-.887zm1.462 2.808v3.158l2.256-1.579-2.256-1.58zM1 8a1 1 0 0 1 1-1h20a1 1 0 1 1 0 2H2a1 1 0 0 1-1-1z"
                            clip-rule="evenodd"></path>
                        <path fill="#000" fill-rule="evenodd"
                            d="M7.684 1.051a1 1 0 0 1 1.265.633l2 6a1 1 0 0 1-1.897.632l-2-6a1 1 0 0 1 .632-1.265zm6 0a1 1 0 0 1 1.265.633l2 6a1 1 0 0 1-1.897.632l-2-6a1 1 0 0 1 .632-1.265z"
                            clip-rule="evenodd"></path>
                    </svg>
                    @endif







                </span>

                <h4 x-cloak x-show="!(shrink||drawer)"
                    class=" text-lg  {{request()->routeIs('reels')?'font-bold':'font-medium'}}">Reel</h4>
            </a></li>


        <li><a wire:navigate href="{{route('chat')}}" class="flex items-center gap-5">

                <span>
                    @if (request()->routeIs('chat') || request()->routeIs('chat.main'))
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z" />
                    </svg>
                    @else
                    <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                        id="messenger">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M14.268,2.112A13,13,0,0,0,6,23.3v3.661A1.258,1.258,0,0,0,7.82,28.09l2.663-1.332a12.9,12.9,0,0,0,7.25,1.126A13,13,0,1,0,14.268,2.112Z">
                        </path>
                        <path
                            d="M9.049,18.163,13.64,11.63a.64.64,0,0,1,.94-.2l3.075,2.307a.641.641,0,0,0,.714.036l3.745-2.646a.64.64,0,0,1,.9.835l-3.707,6.414a.64.64,0,0,1-.9.263L14.3,16.181a.638.638,0,0,0-.615-.024l-3.794,2.9A.641.641,0,0,1,9.049,18.163Z">
                        </path>
                    </svg>
                    @endif




                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Messages</h4>
            </a></li>

        <li>
            <div @click="showSearch=false;showNotifications=true;drawer=true" class="flex items-center gap-5">

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>

                    {{--
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                    </svg>

                    --}}

                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Notifications</h4>
            </div>
        </li>

        <li>
            <div onclick="Livewire.dispatch('openModal', { component: 'post.create' })" class="flex items-center gap-5">

                <span class="border border-gray-600  rounded-lg p-px">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>

                </span>

                <h4 x-cloak x-show="!(shrink||drawer)" class=" text-lg font-medium">Create</h4>
            </div>
        </li>


        @auth

        <li>
            <a wire:navigate href="{{route('profile.home',auth()->user()->username)}}" class="flex items-center gap-5">


                <x-avatar src="https://source.unsplash.com/400x400?face" class=" w-7 h-7 shrink-0" />

                <h4 x-cloak x-show="!(shrink||drawer)"
                    class=" text-lg  {{request()->routeIs('profile.home')?'font-bold':'font-medium'}} ">Profile</h4>
            </a>
        </li>
        @endauth

    </ul>


    {{-- Footer --}}
    <footer class="sticky bottom-0 mt-auto w-full grid px-3 z-50 bg-white">
        <div class="dropdown dropdown-top ">
            <label tabindex="0" class=" cursor-pointer bg-white  flex items-center w-full gap-5 m-1">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd"
                            d="M3 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 5.25zm0 4.5A.75.75 0 013.75 9h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 9.75zm0 4.5a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75zm0 4.5a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd" />
                    </svg>

                </span>
                <h3 x-cloak x-show="!(shrink||drawer)" class="text-lg font-medium">More</h3>
            </label>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 space-y-3 shadow bg-base-100 rounded-box w-60">

                <li><a class="flex items-center gap-5 py-2">

                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                            </svg>

                        </span>

                        <h4>Saved</h4>

                    </a></li>



                <hr>

                <li><a class="py-2">Settings</a></li>
                <li><a class="py-2">


                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button onclick="event.preventDefault();
                    this.closest('form').submit();">
                                Logout
                            </button>
                            {{-- <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link> --}}
                        </form>

                    </a></li>
            </ul>
        </div>
    </footer>





    <div x-show="drawer" x-cloak x-transition.origin.left
        @click.outside="drawer=false;showSearch=false;showNotifications=false"
        class="fixed inset-y-0 left-[70px] w-96 px-4 overflow-y-scroll overflow-x-hidden shadow bg-white border rounded-r-2xl z-[50]">



        <template x-if="showSearch">

            <div class="h-full">

                <header class="sticky top-0 w-full z-10 bg-white py-2">

                    <h5 class="text-4xl font-bold my-4">Search</h5>

                    {{-- input --}}

                    <input wire:model.live="query" type="search" placeholder="Search"
                        class="border-0 outline-none w-full focus:outline-none bg-gray-100 rounded-lg hover:ring-0 focus:ring-0">

                </header>

                <main>
                    @if ($results)
                    <ul class="space-y-2 overflow-x-hidden">
                        @foreach ($results as $key=> $user)
                        <li>

                            <a href="{{route('profile.home',$user->username)}}"
                                class="flex gap-2 truncate items-center">

                                <x-avatar wire:ignore class="w-9 h-9 mb-auto"
                                    src="https://source.unsplash.com/500x500?face-{{$key}}" />

                                <div class="flex flex-col">
                                    <span class="font-bold text-sm">{{$user->username}}</span>
                                    <span class="font-normal text-xs truncate">{{fake()->sentence()}}</span>


                                </div>

                            </a>

                        </li>
                        @endforeach
                    </ul>
                    @else

                    <center>
                        No results
                    </center>

                    @endif


                </main>

            </div>


        </template>

        <div x-cloak x-show="showNotifications">

            <livewire:components.notifications />

        </div>


    </div>


</div>