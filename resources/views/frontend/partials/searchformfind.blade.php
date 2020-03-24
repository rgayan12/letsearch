<div class="card no-border-card">
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
        <form action="{{route('search')}}" method="GET">
                    <div class="row mt-2">
                        <div class="col-md-8 p-md-0 p-lg-0 mb-2">
                        <input class="form-control form-control-lg" name="search" type="text" placeholder="What you really really want? toilet roll, a new movie to watch">
                        </div>
                        <div class="col-md-4 p-md-0 p-lg-0">
                            <select class="ml-md-1 form-control custom-select-lg" id="select_category" name="category">
                            <option value="" selected>Any Category</option>
                            @foreach($sharecategories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <p class="info ml-md-1"><small>Only categories that has available items will be shown</small>
                        </div>
                    <!--  <div class="col-md-3 pr-1">
                        <input class="form-control form-control-lg" name="postcode" type="text" placeholder="Your postcode">
                         </div> -->
                    </div>


                
                <div class="button mt-2 text-center">
                    <button type="submit" class="btn btn-lg btn-info">Search</button>
                </div>
            </form> 
        </div>
    </div>
</div>
