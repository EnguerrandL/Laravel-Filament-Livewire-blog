<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{

    use WithPagination;

    #[Url()]
    public $sort = 'DESC';

    #[Url()]
    public $search = '';


    #[Url()]
    public $category = '';




    public function setSort($sort)
    {

        $this->sort = ($sort === 'DESC') ? 'DESC' : 'ASC';
        // $this->resetPage();

    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }


    public function clearFilters(){
        $this->search = '';
        $this->category = '';
        $this->resetPage();
    }

    #[Computed()]
    // when using computed, you need to use $this to call data in blade file
    public function  posts()
    {
        return Post::published()

            ->orderBy('published_at', $this->sort)
            ->when($this->activeCategory, function ($query) {
                $query->withCategory($this->category);
            })
            ->where('title', 'like', "%{$this->search}%")
            ->paginate(5);
        // return Post::published()->orderBy('published_at', 'DESC')->simplePaginate(5);

    }

    #[Computed()]
    public function activeCategory()
    {
        return Category::where('slug', $this->category)->first();
    }


    public function render()
    {
        return view('livewire.post-list');
    }
}
