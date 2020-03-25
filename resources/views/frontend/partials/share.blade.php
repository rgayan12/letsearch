<div class="col-md-4 mt-2 col-xl-4">
            <div class="card">
            
            <div class="card-body">
                <div class="clearfix float-right">
                <span class="badge badge-success">Share</span>
                </div>
                <h5 class="card-title"><strong>{{ $item->person_name ?? '' }}</strong></h5>
                <h5 class="card-title"><strong>Like to share </strong></h5>
                <p class="card-text">{{ $item->sharing_product ?? '' }}</p>
                <h5 class="card-title"><strong>Need</strong></h5>
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