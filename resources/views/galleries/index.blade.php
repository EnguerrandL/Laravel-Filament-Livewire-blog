<x-app-layout title='Gallery Page'>



<div class="">

    
    @forelse ($galleries as $gallery)
        
  
    <h1 class="text-xl">{{ $gallery->name }} </h1>
        <div class="grid grid-cols-2 gap-2">

           
            @foreach ($gallery->url as $url)
                <div>

                    <img class="h-auto max-w-full rounded-lg" src="{{ Storage::url($url) }}" alt="">
                </div>
            @endforeach


        </div>
        @empty

        <h1>No galleries to show </h1>
        
        @endforelse 
</div>








   
</x-app-layout>
