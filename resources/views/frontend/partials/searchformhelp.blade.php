<div class="card no-border-card">
    
    <div id="collapseTwo" class="collapse {{ (Session::has('postcodeerror')) ? 'show' : ''}}" aria-labelledby="headingTwo" data-parent="#accordion">
            <form action="{{ route('helplocal') }}" method="GET">

            <div class="card-body">
            <div class="form-group">
            <div class="row mt-2">
                        <div class="col-md-4 p-md-0 p-lg-0 mb-2">
                        <label for="postcode">Postcode</label>
            <input type="text" class="form-control form-control-lg" id="postcode" required="true" value="{{Request()->postcode}}" name="postcode" aria-describedby="ukpostcode" placeholder="UK postcode">
                @if(Session::has('postcodeerror'))
                
                <div class="invalid-feedback d-block">
                <strong>{{ Session::get('postcodeerror') }}</strong>
                </div>
                @endif 
                        </div>
                        <div class="col-md-4 p-md-0 p-lg-0">
                        <div class="form-group">
            <label for="radius">Within</label>

            <select class="form-control custom-select-lg" id="radius" name="radius" id="radius">
            <option value="5" {{ Request()->radius == '5' ? 'selected' : '' }}>5 miles</option>
            <option value="10" {{ Request()->radius == '10' ? 'selected' : '' }}>10 miles</option>
            <option value="15" {{ Request()->radius == '15' ? 'selected' : '' }}>15 miles</option>
            <option value="20" {{ Request()->radius == '20' ? 'selected' : '' }}>20 miles</option>
            <option value="25" {{ Request()->radius == '25' ? 'selected' : '' }}>25 miles</option>
            </select>
            </div>
                        </div>
                        <div class="col-md-4 p-md-0 p-lg-0">
                        <div class="form-group">
                            <label for="radius">Category</label>
                            <select class="form-control custom-select-lg" id="select_category" name="category_id">
                            <option value="" selected>Any Category</option>
                            @foreach($requestcategories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <p class="info ml-md-1"><small>Only categories that has available items will be shown</small>
                        </div>
                        </div>
                    </div>
          
            </div>
            <div class="button mt-2 text-center">
                    <button type="submit" class="btn btn-lg btn-info">Search</button>
                </div>
            </div>
            </form>
        </div>
    </div>
 