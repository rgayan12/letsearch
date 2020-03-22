@extends('frontend.base.layout')
@section('content')

<div class="container mt-3">
    @if(Session::has('successmessage'))

        <div class="alert alert-success" role="alert">
        <h1 class="heading-text">{{ Session::get('successmessage') }} Your item is now available to the visitors to see.</h1>
        <h4 class="mt-2">Keep your phone close people might be in touch with you. Don't forget to click the link you received when you share the item with someone</h4>
        </div>
        <div class="alert alert-info" role="alert">
        <h5 class="mt-2">Hope you enjoyed our service. If you would like share your feedback (good or bad) <a href="{{route('contact')}}">Click Here to drop us a message</a></h5>
        </div>
    @endif

    @if(Session::has('deactivatemessage'))
        <div class="alert alert-success" role="alert">
        <h1 class="heading-text">{{ Session::get('deactivatemessage') }} Your item is now removed from the site</h1>
        <h4 class="mt-2">If this was a mistake you can create a new item by clicking share item button.</h4>
        </div>
        <div class="alert alert-info" role="alert">
        <h5 class="mt-2">Hope you enjoyed our service. If you would like share your feedback (good or bad) <a href="{{route('contact')}}">Click Here to drop us a message</a></h5>
        </div>
    
    @endif


</div>


@endsection