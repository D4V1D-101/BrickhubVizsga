<?php
namespace App\Livewire;

use App\Models\Article;
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

        if (!empty($this->categorySlug)) {
            $category = Genres::where('slug', $this->categorySlug)->first();

            if (empty($category)) {
                abort(404);
            }

            $articles = Article::where('game_id', $category->id)
                ->orderBy('created_at', 'DESC')
                ->get();
        } else {
            $articles = Article::orderBy('created_at', 'DESC')->get();
        }

        $latestArticles = Article::orderBy('created_at', 'DESC')->limit(3)->get();

        return view('livewire.show-blog', [
            'articles' => $articles,
            'categories' => $categories,
            'latestArticles' => $latestArticles
        ]);
    }
}