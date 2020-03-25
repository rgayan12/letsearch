@extends('frontend.base.layout')
@section('content')
<div class="container mt-4 mb-3">

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
