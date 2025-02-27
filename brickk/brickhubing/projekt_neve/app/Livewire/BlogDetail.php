<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class BlogDetail extends Component
{
    public $blogID = null;
    public function mount($id){
        $this->blogID = $id;

    }
    public function render()
    {
        $article = Article::select('articles.*','genres.name as genres_name')->leftJoin('genres','genres.id','articles.game_id')
        ->findOrFail($this->blogID);
        return view('livewire.blog-detail',[
            'article' => $article
        ]);
    }
}
