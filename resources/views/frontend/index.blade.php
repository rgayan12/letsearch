@extends('frontend.base.layout')
@section('content')
<div class="container mt-4">
    <div class="text-center">
    <h1 class="heading-text">I'm looking for</h1>
    <div class="input-group">

             <input class="form-control form-control-lg" type="text" placeholder="What you really really want?">
             <div class="input-group-append">
             <select class="ml-1 form-control custom-select-lg" id="inputGroupSelect03">
    <option selected>Category</option>
    @foreach($categories as $key => $item)
                    <option value="{{ $key }}">{{ $item->name }}</option>
        @endforeach
  </select>
             </div>
    </div>
             <div class="button m-4">

             <button type="button" class="btn btn-lg btn-success">Search</button>

    </div>
    </div>
    <section>
      
<div class="row">

    <div class="col-12">
        @foreach($categories as $category)
        <h2 class="sub-heading mt-4">{{ $category->name }}</h2>

        <div class="row">
            @foreach($category->items as $item)
            <div class="col-md-4 col-xl-4">
            <div class="card">
            
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $item->person_name }}</strong></h5>
                <h5 class="card-title"><strong>sharing : </strong> {{ $item->sharing_product }}</h5>
                <h5 class="card-title"><strong>expect: </strong> {{ $item->asking_product }}</h5>

                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-outline-info">View Number</a>
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
