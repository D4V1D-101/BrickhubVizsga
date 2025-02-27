<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use App\Models\Genres;
use Livewire\Component;
use Livewire\Attributes\Url;
class ShowBlog extends Component
{
    #[Url]
    public $categorySlug = null;

    public function render()
    {
        $categories = Genres::all();
        $paginate = 10;
        if (!empty($this->categorySlug)) {
            $category = Genres::where('slug',$this->categorySlug)->first();

            if (empty($category)) {
                abort(404);
            }
            
            $articles = Article::orderBy('created_at','DESC')
                        ->where('id',$category->id)
                        ->paginate($paginate);
        } else{
            $articles = Article::orderBy('created_at','DESC')
            ->paginate($paginate);
        }

        $latestarticles = Article::orderBy('created_at','DESC')
        ->get()
        ->take(3);


        return view('livewire.show-blog',[
            'articles' => $articles,
            'categories' => $categories,
            'latestarticles' => $latestarticles
        ]);
    }
}
