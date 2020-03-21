@extends('frontend.base.layout')
@section('content')

<div class="container">
    <div class="row">
    @if(Session::has('successmessage'))
        <div class="alert alert-success" role="alert">
        <h1 class="heading-text">{{ Session::get('successmessage') }}</h1>
        </div>
    </div>
    @endif
</div>


@endsection