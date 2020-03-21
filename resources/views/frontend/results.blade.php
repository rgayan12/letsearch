@extends('frontend.base.layout')
@section('content')
<div class="container mt-4">
    <div class="row h-100">
        <div class="col-12">
        @if (Request::is('search'))
        <h1>We found {{ $items->total() }} items that you may like</h1>
        @endif
        @if (Request::is('search/refine'))
        <h1>We found {{ count($items) }} items that you may like</h1>
        @endif    
    </div>
    </div>

    <div class="row">
        <!-- refine search -->
        <div class="col-md-4 mt-2 col-lg-3">
            <form action="{{ route('refine-search') }}" method="GET">
          
                    <div class="card">
                    <div class="card-body">
            <h3>Refine</h3>
            <div class="form-group">
                        <input type="hidden" name="search" value="{{Request()->search}}">
                        <label for="postcode">Postcode</label>
                        <input type="text" class="form-control" id="postcode" required="true" value="{{old('postcode')}}" name="postcode" aria-describedby="ukpostcode" placeholder="UK postcode">
            </div>
            <div class="form-group">
                        <label for="radius">Within</label>
                        <select class="form-control" id="radius" name="radius">
                        <option value="5" selected>5 miles</option>
                        <option value="10">10 miles</option>
                        <option value="15">15 miles</option>
                        <option value="20">20 miles</option>
                        <option value="25">25 miles</option>
                        </select>
                        <button type="submit" class="mt-2 btn btn-outline-success">Refine</button>
                    </div>
                    </div>
             </div>
            </form>
        </div>
        <!-- End of refine Search -->

        <!-- Actual results -->
        <div class="col-md-8 col-lg-9">
       @if(count($items) > 0)
       <div class="row">
        @foreach($items as $item)
            <div class="col-md-4 mt-2 col-xl-4">
            <div class="card">
            
            <div class="card-body">
                <div class="clearfix float-right">{{ round($item->distance) ?? '' }} Approx</div>
                <br />
                <h5 class="card-title"><strong>{{ $item->person_name }}</strong></h5>
                <h5 class="card-title"><strong>can share : </strong> {{ $item->sharing_product }}</h5>
                <h5 class="card-title"><strong>for: </strong> {{ $item->asking_product }}</h5>
                    {{$item->Url}}
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-outline-info">Reveal Contact Number</a>
            </div>
            </div>
            </div>
            @endforeach
            </div>
            <div class="justify-content-center">
            @if (Request::is('search'))
            {{ $items->appends(request()->except('page'))->links() }}
            @endif
        </div>
        @endif
        </div>
        <!-- End of Actual results -->

    </div>

</div>

@endsection
