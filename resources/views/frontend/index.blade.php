@extends('frontend.base.layout')
@section('content')
<div class="container mt-4">
    <div class="text-center">
    <h1 class="heading-text">I'm looking for</h1>
     <form action="{{route('search')}}" method="GET">
            <div class="row mt-2">
                <div class="col-md-8 p-md-0 p-lg-0 mb-2">
                 <input class="form-control form-control-lg" name="search" type="text" placeholder="What you really really want? toilet roll, a new movie to watch">
                </div>
                <div class="col-md-4 p-md-0 p-lg-0">
                    <select class="ml-md-1 form-control custom-select-lg" id="select_category" name="category">
                    <option value="" selected>Category</option>
                    @foreach($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
              <!--  <div class="col-md-3 pr-1">
                 <input class="form-control form-control-lg" name="postcode" type="text" placeholder="Your postcode">
                   
                </div>
-->
            </div>


        
        <div class="button m-4">
             <button type="submit" class="btn btn-lg btn-success">Search</button>
        </div>
    </form>    

    </div>

    <section>
      
<div class="row">

    <div class="col-12">
        @foreach($categories as $category)
        <h2 class="sub-heading mt-4"><u>{{ $category->name }}</u></h2>

        <div class="row">
            @foreach($category->items as $item)
            <div class="col-md-4 mt-2 col-xl-4">
            <div class="card">
            
            <div class="card-body">
            <h5 class="card-title"><strong>{{ $item->person_name ?? '' }}</strong></h5>
                <h5 class="card-title"><strong>Like to share </strong></h5>
                <p class="card-text">{{ $item->sharing_product ?? '' }}</p>
                <h5 class="card-title"><strong>Like to have</strong></h5>
                <p class="card-text"> {{ $item->updatedAskingProduct ?? '' }}</p>
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
        @endforeach
    </div>
</div>
      
    </section>
    
    
             

    </div>
</div>


@include('frontend.footer')




@endsection
