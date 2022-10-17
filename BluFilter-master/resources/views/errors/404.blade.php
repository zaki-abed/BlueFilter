@extends('errors.layout')

@section('code', '404')

@section('content')
    <h1 class="error-page mt-4"><span>404!</span></h1>
    <h4 class="mb-4 mt-5">Sorry, page not found</h4>
    <p class="mb-4">It will be as simple as Occidental in fact, it will Occidental <br> to an English person</p>
    <a class="btn btn-primary mb-4 waves-effect waves-light" href="{{ route('home') }}">
        <i class="mdi mdi-home"></i> Back to Dashboard</a>
@endsection
