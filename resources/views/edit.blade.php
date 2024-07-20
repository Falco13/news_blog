@extends('layout')

@section('title')
Edit Post
@endsection

@section('content')

<form action="{{ route('update', ['id'=>$post->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <h3>Edit Post</h3>
    <div class="form-group">
        <input type="text" name="title" placeholder="Your title" class="form-control" value="{{ $post->title }}"><br>
        <textarea name="description" rows="10" placeholder="Your text" class="form-control">{{ $post->description }}</textarea><br>
        <input type="file" name="img"><br>
    </div>
    <br><input type="submit" value="Edit Post" class="btn btn-success">
</form>

@endsection
