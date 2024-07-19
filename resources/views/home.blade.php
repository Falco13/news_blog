@extends('layout')

@section('title')
Home Page
@endsection

@section('content')
<br>
<div class="container-fluid">
    <form method="GET" action="{{ route('search') }}" class="d-flex">
        <input class="form-control me-2" name="search" type="search" value="{{ request()->input('search') }}" placeholder="Search">
        <button class="btn btn-warning" type="submit">Search</button>
    </form>
</div>
<br>

<div class="container">
@if(!empty($search_is))
    @if(count($posts)>0)
        <h2>Your search results "{{ $search_is }}"</h2>
        <p class="lead">Total found: {{ $posts->total() }} posts...</p>
    @else
        <h2>Nothing was found for your "{{ $search_is }}" request...</h2>
    @endif
@endif

<div class="row">
@if($posts->count()>0)
@foreach ($posts as $post)
    <div class="col-6">
        <div class="card">
        <div class="card-header"><h3>{{ $post->title }}</h3></div>
            <div class="card-body">
                <div class="card-img" style="background-image: url({{ $post->img ?? asset('img/news-image.jpg') }})"></div>
                <h5 class="card-title">{{ $post->short_title }}</h5>
                <p class="card-text">{{ $post->description }}</p>
                <div class="alert alert-dark" role="alert">Author: <strong>{{ $post->user->name }}</strong> | Publication date: <i>{{ $post->created_at->diffForHumans() }}</i></div>
                <a href="{{ route('show', ['id'=>$post->id]) }}" class="btn btn-warning">Read...</a>
            </div>
        </div>
    </div>
@endforeach
</div>
</div>

{{ $posts->appends(['search' => $search_is])->links() }}

@else
    <h3>There are no entries...</h3>
@endif

@endsection
