<x-app-layout title='Gallery Page'>
    <style>
        .swiper {
            width: 600px;
            height: 300px;
        }
    </style>

    {{-- 
<div class="grid grid-cols-3 gap-1">

    
    @forelse ($galleries as $gallery)
        
   

        <div class="flex">
            <h1 class="text-xl flex">{{ $gallery->name }} </h1>
           
            @foreach ($gallery->url as $url)
                <div>

                    <img class="h-auto   rounded-lg" src="{{ Storage::url($url) }}" alt="">
                </div>
            @endforeach


        </div>
        @empty

        <h1>No galleries to show </h1>
        
        @endforelse 


</div> --}}


    <div class="w-full">
        @foreach ($galleries as $gallery)
            <h1 class="justify-center text-center mb-10 text-3xl">{{ $gallery->name }}</h1>
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">



                    @foreach ($gallery->url as $url)
                        <!-- Slides -->

                        <img class=" swiper-slide h-auto   rounded-lg" src="{{ Storage::url($url) }}" alt="">
                    @endforeach

                    ...
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
        @endforeach

    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>

</x-app-layout>
