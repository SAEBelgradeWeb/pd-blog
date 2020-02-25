@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
        @auth
        <a href="/posts/create" class="btn btn-primary">Create new post</a>
        @endauth
        </div>
        @foreach($posts as $post)
            <div class="card-container">
                <div class="card">
                    <div class="card-image">
                        @if($post->image)
                            <img class="card-img-top" src="{{asset( 'storage/' . $post->image)}}" alt="{{$post->title}}">
                        @else
                            <img class="card-img-top" src="/images/default.png" alt="{{$post->title}}">
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h5>
                        <div class="card-author">
                            <p>Author: {{$post->user->name}} </p>
                            <p>Category: <strong>{{$post->category->title}}</strong></p>
                        </div>
                        <p class="card-text"> {!! Str::limit($post->body, 100) !!}</p>
                        <div class="card-tags"> @foreach($post->tags as $tag) <strong><span
                                    class="tag-accent">#</span>{{$tag->title}}</strong> @endforeach</div>
                        <a href="/posts/{{$post->id}}" class="btn card-btn btn-primary">Read more</a>
                        @auth
                            <form action="/posts/{{$post->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger ">Delete</button>
                            </form>

                            <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
