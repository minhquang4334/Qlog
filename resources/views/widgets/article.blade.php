<div class="container list">
    <div class="row">
        <ul class="list-unstyled full-with">
            @forelse($articles as $article)
            <li class="media">
                @if($article->page_image)
                <div class="media-left mr-3">
                    <div style="background-image: url({{ $article->page_image }})" class="post-card-image"> </div>
                </div>
                @endif
                <div class="media-body">
                    <h6 class="media-heading">
                        <a href="{{ url($article->slug) }}">
                            {{ $article->title }}
                        </a>
                    </h6>
                    <div class="meta">
                        <span class="cinema">{{ $article->subtitle }}</span>
                    </div>
                    <div class="description">
                        {{ $article->meta_description }}
                    </div>
                    <div class="extra">
                        @foreach($article->tags as $tag)
                        <a href="{{ url('tag', ['tag' => $tag->tag]) }}">
                            <div class="label"><i class="fas fa-tag"></i>{{ $tag->tag }}</div>
                        </a>
                        @endforeach

                        <div class="info">
                            {{--<i class="fas fa-user"></i><span class="text-info">{{ $article->user->name or 'null' }}&nbsp;</span>--}}
                            <i class="fas fa-clock"></i><span class="text-info">{{ $article->published_at->diffForHumans(\Carbon\Carbon::now(), false, false) }}</span>
                            <i class="fas fa-eye"></i><span class="text-info">{{ $article->view_count }}</span>
                            <a href="{{ url($article->slug) }}" class="float-right">
                                Read More <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            @empty
                <h3 class="text-center">{{ lang('Nothing') }}</h3>
            @endforelse
        </ul>
    </div>
</div>