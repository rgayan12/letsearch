@extends('frontend.base.layout')
@section('content')
<div class="container mt-4">
    <div class="row h-100">
     
      <div class="col-md-12  mt-xl-5 col-xl-5">
            <h1 class="heading-text">How it works </h1> 
            <div class="d-none d-lg-block">
              @include('frontend.howitworks')
            </div>
            <div class="d-block d-lg-none mb-3 text-center">
              <a class="btn btn-lg btn-success" href="{{route('howitworks')}}">Click here to Learn more</a>
            </div>
        </div>

        <div class="col-md-12 col-xl-7 mt-xl-5">
 
    <h1 class="heading-text">Share an Item</h1> 
      
    <form action="{{route('item.store')}}" method="post">
    @csrf
    <div class="form-group row">
    <label for="person_name" class="col-sm-4 col-form-label">Your Name</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('person_name') is-invalid @enderror" id="person_name" name="person_name" value="{{old('person_name')}}"  placeholder="Your Name" required>
     @error('person_name')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror  
    </div>
  </div>

  <div class="form-group row">
    <label for="phone_number" class="col-sm-4 col-form-label">Mobile Phone</label>
    <div class="col-sm-8">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">+440</span>
      </div>
    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{old('phone_number')}}" placeholder="This is how people will contact you" required>
    @error('phone_number')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror 
      </div>  
      </div>
  </div>
  <div class="form-group row">
    <label for="postcode" class="col-sm-4 col-form-label">Postcode</label>
    <div class="col-sm-8">
      <input type="text" class="form-control @error('postcode') is-invalid @enderror" id="postcode" name="postcode" value="{{old('postcode')}}"  placeholder="This is how people will find things close to them" required>
      @if(Session::has('postcodeerror'))
      <div class="invalid-feedback d-block">
        <strong>{{ Session::get('postcodeerror') }}</strong>
      </div>
      @endif 
    </div>

   
  </div>

   <div class="form-group row">
    <label for="sharing_product" class="col-sm-4 col-form-label">What you like to share</label>
    <div class="col-sm-8">
     <textarea class="form-control @error('sharing_product') is-invalid @enderror" id="sharing_product" name="sharing_product" rows="3" placeholder="Please explain what you like to share with 20 words" required="true">{{old('sharing_product')}}</textarea>
     @error('sharing_product')
        <div class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </div>
    @enderror 
    </div>
  </div>

  <div class="form-group">
    <div class="row">
      <label for="category_id" class="col-sm-4 col-form-label">Please select a category</label>
      <div class="col-sm-8">
        <select class="form-control" name="category_id" required="true">
          <option value="">Please select</option>
          @foreach($categories as $key => $item)
                    <option value="{{ $key }}" {{(old('category_id') == $key) ? 'selected' : '' }} >{{ $item }}</option>
            @endforeach
        </select>
</div>
    </div>
  </div>


  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-4 pt-0">Do you expect something in return ?</legend>
      <div class="col-sm-8">
          
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="return_expected" id="return_expected-yes" value="1" {{ (old('return_expected') == '1') ? 'checked' : '' }} required> 
          <label class="form-check-label" for="return_expected">
            Yes
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="return_expected" {{ (old('return_expected') == '0') ? 'checked' : '' }} id="return_expected-no" value="0">
          <label class="form-check-label" for="gridRadios2">
            No
          </label>
        </div>
        <div id="asking_product_div">
        <textarea class="form-control" id="asking_product" name="asking_product" rows="3" placeholder="Please explain what you want in return with 20 words">{{old('asking_product')}}</textarea>
        </div>


      </div>
    </div>
  </fieldset>
  <div class="form-group row">
  <div class="alert alert-info" role="alert">
    <p>Please note that once you submit this form you will get a text message with a link to remove the item from the platform</p>
    <p>Also note that you cant make edits to the item once you publish it. You will have to click on the link and remove the product then create a new one. So double check before hitting the below button :) </p>
  </div>
  </div>
   <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-lg btn-success">Lets do it</button>
    </div>
  </div>
</form>
        </div>
    </div>
 
</div>



@endsection
