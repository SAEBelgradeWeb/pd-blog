@extends('layouts.app')


@section('content')
    <div class="container post-card">

        <div class="post-img card-image">
            <img class="card-img-top" src="{{$post->image}}" alt=" ">
        </div>
        <div class="card-body">
            <div class="post-sub">
                <div class="post-info">
                    <h1 class="post-title">{{$post->title}}</h1>
                    <div class="post-author">By {{$post->user->name}} </div>

                </div>

                <div class="post-cat"><strong>{{$post->category->title}}</strong></div>
            </div>

            <div class="post-body clearfix">{!! $post->body !!}</div>
            <div class="post-tag "> @foreach($post->tags as $tag) <strong><span class="tag-accent">#</span>{{$tag->title}}</strong> @endforeach</div>
        </div>
    </div>
@endsection
