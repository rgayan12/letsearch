@extends('frontend.base.layout')
@section('content')
<div class="container mt-4 mb-5">
    <div class="row h-100">
        <div class="col-12">
            <h1>We found {{ count($items) }} {{ count($items) > 1 ? 'people' : 'person'  }}  that you can help</h1>
         
    </div>
    </div>

    <div class="row">
        <!-- Actual results -->
        <div class="col-md-8 col-lg-9">
            @if(count($items) > 0)
            <div class="row">
                @foreach($items as $item)
                    <div class="col-md-6 mt-2 col-xl-4">
                    <div class="card">
            
            <div class="card-body">
                <div class="clearfix float-right">
                <span class="badge badge-warning">Request</span>
                </div>
                <h5 class="card-title"><strong>{{ $item->person_name ?? '' }}</strong></h5>
                <h5 class="card-title"><strong>Need</strong></h5>
                <p class="card-text"> {{ $item->asking_product ?? '' }}</p>
                <h5 class="card-title"><strong>Can afford to pay</strong></h5>
                <p class="card-text"> {{ ($item->can_afford ==  1) ? 'Yes' : 'No' }}</p>
                
                <h5 class="card-title"><strong>Location : </strong> {{ $item->SanitizedPostCode ?? '' }}</h5>

                    
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
