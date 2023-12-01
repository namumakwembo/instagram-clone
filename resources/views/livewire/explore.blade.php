<div class="my-5 lg:px-8">



    <ul class="grid grid-cols-3 sm:gap-3">

        @foreach ($posts as $post)

        @php
        $cover= $post->media()->first();
        @endphp

        <li
           onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{$post->id}}}})"
            class="h-28 sm:h-80 w-full cursor-pointer border rounded bg-black relative items-center flex justify-center group">


            {{-- hover show comments and likes --}}
            <div
                class="hidden group-hover:flex transition-all absolute inset-x-0 m-auto z-10 max-w-fit items-center gap-2">

                {{-- likes count --}}
                <div class="flex items-center gap-2 text-white font-bold">
                    <span>

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path
                                d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                        </svg>

                    </span>

                    {{$post->likers->count()}}
                </div>

                {{-- Comments count --}}

                <div class="flex items-center gap-2 text-white font-bold">
                    <span>

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M5.337 21.718a6.707 6.707 0 01-.533-.074.75.75 0 01-.44-1.223 3.73 3.73 0 00.814-1.686c.023-.115-.022-.317-.254-.543C3.274 16.587 2.25 14.41 2.25 12c0-5.03 4.428-9 9.75-9s9.75 3.97 9.75 9c0 5.03-4.428 9-9.75 9-.833 0-1.643-.097-2.417-.279a6.721 6.721 0 01-4.246.997z"
                                clip-rule="evenodd" />
                        </svg>


                    </span>

                    {{$post->comments->count()}}
                </div>




            </div>


            {{-- icons --}}

            {{-- if post && has multiple media --}}
            @if ($post->type=='post'&& $post->media->count()>1)

            <div class="absolute top-4 right-4 z-10 text-white">
                <span>

                    <svg class="h-6 w-6" fill="none" height="24" viewBox="0 0 24 24" width="24"
                        xmlns="http://www.w3.org/2000/svg">
                        <g fill="currentColor">
                            <path
                                d="m16 12.9v4.2c0 3.5-1.4 4.9-4.9 4.9h-4.2c-3.5 0-4.9-1.4-4.9-4.9v-4.2c0-3.5 1.4-4.9 4.9-4.9h4.2c3.5 0 4.9 1.4 4.9 4.9z" />
                            <path
                                d="m17.0998 2h-4.2c-3.08312 0-4.52906 1.09409-4.83029 3.73901-.06302.55334.39525 1.01099.95216 1.01099h2.07813c4.2 0 6.15 1.95 6.15 6.15v2.0781c0 .5569.4576 1.0152 1.011.9522 2.6449-.3013 3.739-1.7472 3.739-4.8303v-4.2c0-3.5-1.4-4.9-4.9-4.9z" />
                        </g>
                    </svg>
                </span>
            </div>
            @endif


            @if ($post->type=='reel')

            <div class="absolute top-4 right-4 z-10 text-white">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                        id="instagram-reel">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M12.6126 1H8.72076L8.94868 1.68377L10.7208 7H14.6126L13.0513 2.31623L12.6126 1ZM15.9766 9C15.9921 9.00036 16.0076 9.00036 16.0231 9H23V17.5C23 20.5376 20.5376 23 17.5 23H6.5C3.46243 23 1 20.5376 1 17.5V9H9.97665C9.99208 9.00036 10.0076 9.00036 10.0231 9H15.9766ZM16.7208 7L14.9487 1.68377L14.7208 1H17.5C20.5376 1 23 3.46243 23 6.5V7H16.7208ZM6.5 1H6.61257L7.05132 2.31623L8.61257 7H1V6.5C1 3.46243 3.46243 1 6.5 1ZM10.0735 10.1808C9.76799 9.96694 9.36892 9.94083 9.03819 10.113C8.70746 10.2852 8.5 10.6271 8.5 11V18C8.5 18.3729 8.70746 18.7148 9.03819 18.887C9.36892 19.0592 9.76799 19.0331 10.0735 18.8192L15.0735 15.3192C15.3408 15.1321 15.5 14.8263 15.5 14.5C15.5 14.1737 15.3408 13.8679 15.0735 13.6808L10.0735 10.1808Z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
            @endif





            @switch($cover->mime)
            @case('video')

            <x-video :controls="false" :cover="true" source="{{$cover->url}}" />
            @break
            @case('image')

            <img src="{{$cover->url}}" alt="image" class="h-full w-full object-cover">

            @break
            @default

            @endswitch

        </li>

        @endforeach

    </ul>


</div>