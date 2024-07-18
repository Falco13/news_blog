@extends('layout')

@section('title')
Home Page
@endsection

@section('content')
<br>
<div class="container-fluid">
    <form method="GET" action="" class="d-flex">
        <input class="form-control me-2" id="s" name="s" type="search" placeholder="Search">
        <button class="btn btn-warning" type="submit">Search</button>
    </form>
</div>
<br>

<div class="container">
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-6">
            <div class="card">
                <div class="card_header"><h4>{{ $post->title }}</h4></div>
                <div class="card_body">
                    <div class="card-img" style="background-image: url({{ $post->img ?? asset('img/news-image.jpg') }})"></div>
                    <div class="card-author">Author: {{ $post->user->name }}</div>
                    <a href="" class="btn btn-warning">Post detail...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{ $posts->links() }}
@endsection
