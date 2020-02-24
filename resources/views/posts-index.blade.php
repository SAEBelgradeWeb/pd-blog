@extends('layouts.app')

@section('content')

    @foreach($posts as $post)

        <div class="card col-3" style="width: 18rem;">
            <img class="card-img-top" src="{{ $post->image }}" alt="{{$post->title}}">
            <div class="card-body">
                <h5 class="card-title"><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h5>
                <p>Author: {{$post->user->name}} Category: <strong>{{$post->category->title}}</strong></p>
                <p class="card-text"> {!! Str::limit($post->body, 100) !!}</p>
                <div>Tags: @foreach($post->tags as $tag) <strong>#{{$tag->title}}</strong> @endforeach</div>
                <a href="/posts/{{$post->id}}" class="btn btn-primary">Read more</a>
            </div>
        </div>
    @endforeach

@endsection
