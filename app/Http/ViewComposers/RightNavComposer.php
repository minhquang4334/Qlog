<?php

namespace App\Http\ViewComposers;

use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;
use Illuminate\View\View;

class RightNavComposer {

    protected $allTags = [];

    protected $latestArticles = [];

    public function __construct(ArticleRepository $article, TagRepository $tags)
    {
        // Dependencies automatically resolved by service container...
        $this->allTags = $tags->all();
        $this->latestArticles = $article->getLatest();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'allTags' => $this->allTags,
            'latestArticles' => $this->latestArticles
        ]);
    }
}