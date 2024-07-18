@extends('layout')

@section('content')
<br>
<div class="container-fluid">
    <form method="GET" action="" class="d-flex">
        <input class="form-control me-2" id="s" name="s" type="search" placeholder="Search by name">
        <button class="btn btn-warning" type="submit">Search</button>
    </form>
</div>
<br>


@endsection
