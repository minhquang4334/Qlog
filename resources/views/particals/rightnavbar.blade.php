<div class="full-with right-nav">
    <header class="latest-article-header">
        <span>Latest</span>
    </header>
    @foreach($latestArticles as $article)
    <a class="article-items" href="{{ url($article->slug)}}">
        <div class="item-thumb" style="background-image: url({{ $article->page_image }})">
        </div>
        <div class="item-content">
            {{ $article->title }}
        </div>
        <div class="item-time">
            {{--{{ $article->published_at }}--}}
            {{\Carbon\Carbon::parse($article->published_at)->format('Y-m-d')}}
        </div>
    </a>
    @endforeach
    <header class="tags-header">
        <span>Tags</span>
    </header>
    <div class="tags-item">
        @foreach($allTags as $tag)
        <a href="{{ url('tag', ['tag' => $tag->tag]) }}">
            {{ $tag->tag }}
        </a>
        @endforeach
    </div>
</div>
