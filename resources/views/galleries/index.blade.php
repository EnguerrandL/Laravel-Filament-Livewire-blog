<x-app-layout title='Gallery Page'>



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
</div>








   
</x-app-layout>
