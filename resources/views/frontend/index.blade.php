@extends('frontend.base.layout')
@section('content')
<div class="container mt-4 mb-3">
<div class="alert alert-info" role="alert">
    <p>Letshare is a platform that can connect people together with little things. For any reason if you can't get out of the house you can simply request an item and someone / organisation in your area can provide that to you</p>
    <p>Also if there's something that you don't need you can share it and get something in return. If you feeling generous you can share it for free</p>
    <p>Go on and explore. We really hope you will enjoy this specially during these difficult times. Please do <a href="{{ route('contact') }}"> contact us </a> if you would like to know more </p>
</div>
<div class="row">
         <div class="col-md-12">
            <div class="category-block" id="searchbox">
               <div class="mb-3">
                  <div class="text-center">
                  <h1 class="heading-text">I want to</h1>
                  
                  <button class="btn btn-lg btn-outline-info school-btn-view mt-xs-0 mt-2" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Find Something
                  </button>

                  <span class="text-center text-info d-none d-md-inline-block">||</span>
                  <button class="btn btn-lg btn-success school-btn-view mt-xs-0 mt-2" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Help Someone
                  </button>
                  </div>
               </div>
               <div id="accordion">
                  @include('frontend.partials.searchformfind')
                  @include('frontend.partials.searchformhelp')
               </div>

            </div>
         </div>
      </div>

<section>
      
<div class="row">

    <div class="col-12">
        @foreach($allcategories as $category)
        <h2 class="sub-heading mt-4"><u>{{ $category->name }}</u></h2>

        <div class="row">
      
            @foreach($category->items as $item)
                @if($item->item_type_id == 1)
                        @include('frontend.partials.request')
                @else
                    @include('frontend.partials.share')
                @endif
            @endforeach
        </div>
        @endforeach
    </div>
</div>
      
    </section>
    
    
             

    </div>
</div>






@endsection
