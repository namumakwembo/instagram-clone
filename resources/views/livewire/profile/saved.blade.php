<x-profile-layout :user="$user">

    <ul class="grid grid-cols-3 gap-3">


        @foreach ($posts as $post)

        @php
            $cover= $post->media()->first();
        @endphp
            
       
        <li 
        onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{$post->id}}}})"
        class="h-32 md:h-72 w-full cursor-pointer border rounded">


            @switch($cover?->mime)
                @case('video')
                    
                <x-video source="{{$cover->url}}" />
                    @break
                @case('image')

                <img src="{{$cover->url}}" alt="image" class="h-full w-full object-cover">
                    
                    @break
                @default
                    
            @endswitch

        </li>

        @endforeach

    </ul>
</x-profile-layout>
