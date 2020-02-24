@extends('partials.layout')


@section('content')
<h1>{{$post->title}}</h1>
<img src="{{$post->image}}" alt="">
    <div>Author: {{$post->user->name}}, Category: <strong>{{$post->category->title}}</strong></div>
    <div>Tags: @foreach($post->tags as $tag) <strong>{{$tag->title}}</strong> @endforeach</div>
    <div>{!! $post->body !!}</div>
@endsection
