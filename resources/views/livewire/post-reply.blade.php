<div  class=" flex  bg-green-300 border-t border-gray-100 pt-10">
    


    @auth


        <input type="text" wire:model="reply"
            class="  flex  items-center justify-center rounded-lg  bg-gray-300 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
            >
        <button wire:click="postReply"
            class=" inline-flex items-center justify-center px-4 font-medium tracking-wide text-white transition duration-200 bg-gray-900 rounded-lg hover:bg-gray-800 focus:shadow-outline focus:outline-none">
            Reply
        </button>
    @else
        <a wire:navigate class="text-yellow-500 underline py-1" href="{{ route('login') }}"> Login to Reply</a>
    @endauth


    <div class="user-comments px-3 py-2 mt-5">
       @foreach ($this->replies as $reply)
           
     
            <div class=" bg-blue-800  comment [&:not(:last-child)]:border-b border-gray-100 py-5">
                <div class="user-meta flex mb-4 text-sm items-center">
                    <x-posts.author :author="$reply->user" size="sm" />
                    <span class="text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                </div>
                <div class="text-justify text-gray-700  text-sm">
                    {{ $reply->reply }}
                </div>
            </div>

            @endforeach
          
    </div class="m-y">
 
</div>
