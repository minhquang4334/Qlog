<footer id="footer" class="footer">
    <div class="container text-center">
        <div class="row padding-top-10">
            <div class="col-md-2 offset-md-5 text-center">
                <ul class="connect">
                    <li class="mx-2">
                        <a href="{{ url('/') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    @if(config('blog.footer.github.open'))
                    <li class="mx-2">
                        <a href="{{ config('blog.footer.github.url') }}" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                    @endif
                    @if(config('blog.footer.twitter.open'))
                    <li class="mx-2">
                        <a href="{{ config('blog.footer.twitter.url') }}" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
            @if(isset($nextArticle))
                <div class="col-md-3 offset-md-1 redirect-article next-article">
                    <span>
                        Next:

                        {{$nextArticle->title}}
                    </span>
                </div>
            @endif
        </div>
    </div>
    {{--<div class="copy-right text-center">--}}
        {{--<span>{!! config('blog.footer.meta') !!}</span>--}}
    {{--</div>--}}
</footer>
