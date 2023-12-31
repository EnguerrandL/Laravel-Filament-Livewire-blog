<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div>
            @if ($this->activeCategory || $search)
                <button class="grey-500 text-xs mr-3" wire:click="clearFilters()">X</button>
            @endif

            @if ($this->activeCategory)
           
                <x-badge wire:navigate href="{{ route('posts.index', ['category' => $this->activeCategory->slug]) }}"
                    :textColor="$this->activeCategory->text_color" bgColor="{{ $this->activeCategory->bg_color }}">
                    {{ $this->activeCategory->title }}
                </x-badge>
            @endif

            @if ($search)
            <span class="ml-2">
                {{__('blog.containing')}} : <strong> {{ $search }} </strong> 
            </span>
            @endif


        </div>
        <div class="flex items-center space-x-4 font-light ">
            
           <x-checkbox  wire:model.live='popular' />
           <x-label> {{__('blog.popular')}} </x-label>
            <button wire:click="setSort('DESC')"
                class="{{ $sort === 'DESC' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }}  py-4 ">
                {{__('blog.latest')}}</button>
            <button wire:click="setSort('ASC')"
                class="{{ $sort === 'ASC' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4 ">
                {{__('blog.oldest')}}</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item wire:key="{{ $post->id }}" :post="$post" />
        @endforeach
    </div>

    <div class="py-3">{{ $this->posts->onEachSide(1)->links() }}</div>
</div>
