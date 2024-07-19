@extends('layout')

@section('title')
Create Post
@endsection

@section('content')

<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <h3>Create Post</h3>
    <div class="form-group">
        <input type="text" name="title" placeholder="Your title" class="form-control"><br>
        <textarea name="description" rows="10" placeholder="Your text" class="form-control"></textarea><br>
        <input type="file" name=""><br>
    </div>
    <br><input type="submit" name="" value="Create Post" class="btn btn-success">
</form>

@endsection
