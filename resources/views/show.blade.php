@extends('layout')

@section('title')
Post detail
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header"><h3>{{ $post->title }}</h3></div>
            <div class="card-body">
                <div class="card-img card-img__max" style="background-image: url({{ $post->img ?? asset('img/news-image.jpg') }})"></div>
                <h5 class="card-title">{{ $post->short_title }}</h5>
                <p class="card-text">{{ $post->description }}</p>
                <div class="alert alert-dark" role="alert">Author: <strong>{{ $post->user->name }}</strong> | Publication date: <i>{{ $post->created_at->diffForHumans() }}</i></div>
                <div class="card-btn">
                    <a href="{{ route('home') }}" class="btn btn-success">Back...</a>
                    <a href="{{ route('edit', ['id'=>$post->id]) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('destroy', ['id'=>$post->id]) }}" method="POST" onsubmit="if (confirm('You really want to delete this post?')) {return true} else {return false}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
