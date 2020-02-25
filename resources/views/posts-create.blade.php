@extends('layouts.app')

@section('content')

    <div class="post-card" style="padding-bottom: 30px">
        <div class="container">
            <h1>Create new post</h1>
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
{{--                <input type="hidden" name="user_id" value="{{\Auth::user()->id}}">--}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="body">Content</label>
                    <textarea name="body" id="body" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $key => $category)
                            <option value="{{$key}}">{{$category}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control" multiple>
                        @foreach($tags as $key => $tag)
                            <option value="{{$key}}">{{$tag}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="post_image">Image</label>
                    <input type="file" class="form-control" id="post_image" name="post_image">
                </div>

                <div>
                    <button class="btn btn-success">Submit</button>
                    <button class="btn btn-info">Reset</button>
                </div>

            </form>

        </div>
    </div>


@endsection
