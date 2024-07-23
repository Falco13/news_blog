@extends('layout')

@section('title')
404
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header"><h3>404 Page Not Found</h3></div>
            <div class="card-body">
                <div class="card-img card-img__max" style="background-image: url({{ asset('img/ufo.jpg') }})"></div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('home') }}" class="btn btn-danger">Go home...</a>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
