@extends('layouts.app')

@section('title', $article->title)

@section('content')
    {{--@component('particals.jumbotron')
        <h3>{{ $article->title }}</h3>

        <h5>{{ $article->subtitle }}</h5>

        <div class="header">
            <i class="fas fa-user"></i>{{ $article->user->name or 'null' }}，
            @if(count($article->tags))
            <i class="fas fa-tags"></i>
                @foreach($article->tags as $tag)
                    <a href="{{ url('tag', ['tag' => $tag->tag]) }}">{{ $tag->tag }}</a>，
                @endforeach
            @endif
            <i class="fas fa-clock"></i>{{ $article->published_at->diffForHumans() }}
        </div>
    @endcomponent--}}

    <div class="article container">
        <div class="row">
            <div class="col-md-8 offset-md-2 show-content">

                <parse content="{{ $article->content['raw'] }}" class="font-content first-letra" id="first-p"></parse>
{{--
                <script src="https://gist.github.com/minhquang4334/599d93ba386cc89a7bd2984365f1e225.js"/>
--}}
                @if($article->is_original)
                <div class="publishing alert alert-dismissible alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {!! config('blog.license') !!}
                </div>
                @endif
                @if(config('blog.social_share.article_share'))
                <div class="footing">
                    <div class="social-share"
                        data-title="{{ $article->title }}"
                        data-description="{{ $article->title }}"
                        {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }}
                        {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }}
                        initialized></div>
                </div>
                @endif
            </div>
        </div>
    </div>

    @if(Auth::guest())
        <comment title="评论"
                 commentable-type="articles"
                 commentable-id="{{ $article->id }}"></comment>
    @else
        <comment title="评论"
                 username="{{ Auth::user()->name }}"
                 user-avatar="{{ Auth::user()->avatar }}"
                 commentable-type="articles"
                 commentable-id="{{ $article->id }}"
                 can-comment></comment>
    @endif

@endsection

@section('scripts')
    <script>
        hljs.initHighlightingOnLoad();
        $(document).ready(function () {
          let firstP = $('#first-p').find("p:first-child").first();
          firstP.addClass('first-p-element');
          let githubSource = document.createElement('script');
          githubSource.src = 'https://gist.github.com/minhquang4334/599d93ba386cc89a7bd2984365f1e225.js';
          let link = 'https://gist.github.com/minhquang4334/599d93ba386cc89a7bd2984365f1e225.js';
          postscribe('#first-p','<script src=https://gist.github.com/minhquang4334/599d93ba386cc89a7bd2984365f1e225.js><\/script>')
        })


    </script>
@endsection

@section('styles')
    <style>

    </style>
@endsection
