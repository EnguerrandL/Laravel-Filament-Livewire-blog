<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div>

            @if ($search )
                Searching {{ $search }}
            @endif

        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button wire:click="setSort('DESC')" class="{{ $sort === 'DESC' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }}  py-4 ">
                Latest</button>
            <button wire:click="setSort('ASC')" class="{{ $sort === 'ASC' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4 ">
                Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item :post="$post" />
        @endforeach
    </div>

    <div class="py-3">{{$this->posts->onEachSide(1)->links() }}</div>
</div>
