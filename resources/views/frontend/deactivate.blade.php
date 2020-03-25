@extends('frontend.base.layout')
@section('content')

<div class="container mt-3">
    @if($verified == "true")

        <div class="row col-12">
            <h1 class="d-block">Please below button to remove the item</h1> 
            <div class="w-100"></div>
            <form action="{{route('item.destroy', [$item->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-lg btn-success d-block">Remove Item</button> 
            </form>
        </div>    
    @endif


</div>


@endsection