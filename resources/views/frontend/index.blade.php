@extends('frontend.base.layout')
@section('content')
<div class="container mt-4">
    <div class="text-center">
    <h1 class="heading-text">I'm looking for</h1>
     <form action="{{route('search')}}" method="GET">
            <div class="row mt-2">
                <div class="col-md-8 p-0">
                 <input class="form-control form-control-lg" name="search" type="text" placeholder="What you really really want? bread, a new movie to watch">
                </div>
                <div class="col-md-4 p-0 pl-1">
                    <select class="ml-1 form-control custom-select-lg" id="select_category" name="category">
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
        <h2 class="sub-heading mt-4">{{ $category->name }}</h2>

        <div class="row">
            @foreach($category->items as $item)
            <div class="col-md-4 mt-2 col-xl-4">
            <div class="card">
            
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $item->person_name }}</strong></h5>
                <h5 class="card-title"><strong>can share : </strong> {{ $item->sharing_product }}</h5>
                <h5 class="card-title"><strong>for: </strong> {{ $item->asking_product }}</h5>

                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-outline-info">Reveal Contact Number</a>
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







@endsection
