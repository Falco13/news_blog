@extends('layout')

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
                <div class="card_header">{{ $post->title }}</div>
                <div class="card_body">{{ $post->description }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
