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
                        <input type="text" class="form-control" id="postcode" required="true" value="{{Request()->postcode}}" name="postcode" aria-describedby="ukpostcode" placeholder="UK postcode">
            </div>
            <div class="form-group">
                        <label for="radius">Within</label>
                        
                        <select class="form-control" id="radius" name="radius" id="radius">
                        <option value="5" {{ Request()->radius == '5' ? 'selected' : '' }}>5 miles</option>
                        <option value="10" {{ Request()->radius == '10' ? 'selected' : '' }}>10 miles</option>
                        <option value="15" {{ Request()->radius == '15' ? 'selected' : '' }}>15 miles</option>
                        <option value="20" {{ Request()->radius == '20' ? 'selected' : '' }}>20 miles</option>
                        <option value="25" {{ Request()->radius == '25' ? 'selected' : '' }}>25 miles</option>
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
                    <div class="col-md-6 mt-2 col-xl-4">
                    <div class="card">
                    
                    <div class="card-body">
                        @if(!is_null($item->distance))
                        <div class="clearfix float-right">
                            @if(round($item->distance) < 1)
                            <span class="badge badge-success">Less than 1 mile</span>
                            @else
                            <span class="badge badge-secondary">Approx {{ round($item->distance) ?? '' }} miles</span>
                            @endif
                        </div>
                        <br />
                        @endif
                
                        <h5 class="card-title"><strong>{{ $item->person_name }}</strong></h5>
                        <h5 class="card-title"><strong>Like to share </strong></h5>
                        <p class="card-text">{{ $item->sharing_product }}</p>
                        <h5 class="card-title"><strong>Like to have</strong></h5>
                        <p class="card-text"> {{ $item->updatedAskingProduct }}</p>
                        <h5 class="card-title"><strong>Location : </strong> {{ $item->SanitizedPostCode }}</h5>
                                        
           <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseExample{{$item->id}}" aria-expanded="false" aria-controls="collapseExample{{$item->id}}">
           Reveal Contact Number
            </button>


                <div class="collapse" id="collapseExample{{$item->id}}">
                <h5 class="card-title mt-2"> {{ $item->phone_number ?? '' }} </h5>
                </div>
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
                @else 
            <div class="row">
                <div class="col-md-12 mt-2 col-xl-12">
                <div class="alert alert-info" role="alert">
                        <h4><p>We could not find any matching results for your search.</p> <br />Please try to change the criteria </h4>
                </div>
            </div>
        </div>
                @endif
      
        <!-- End of Actual results -->

    </div>

</div>
</div>
@endsection
