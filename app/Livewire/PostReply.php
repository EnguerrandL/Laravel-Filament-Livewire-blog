<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PostReply extends Component
{

    #[Rule('required')]
    public Reply $reply;
    public Comment $comment;


    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }


    #[Computed()]
    public function replies()
    {
        return $this?->comment->replies()->latest()->paginate(5);
    }




    public function postReply()
    {
        $reply = new Reply([
            'reply' => $this->reply,
            'user_id' => auth()->id(),
            'comment_id' => $this->comment->id
        ]);

        $this->comment->replies()->save($reply);

        $this->reset('reply');
    }


    public function render()
    {
        return view('livewire.post-reply');
    }
}
