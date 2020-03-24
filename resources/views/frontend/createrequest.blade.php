@extends('frontend.base.layout')
@section('content')
<div class="container mt-4">
    <div class="row h-100">
     
    <!--
      <div class="col-md-12  mt-xl-5 col-xl-5">
            <h1 class="heading-text">How it works </h1> 
            <div class="d-none d-lg-block">
              @include('frontend.howitworks')
            </div>
            <div class="d-block d-lg-none mb-3 text-center">
              <a class="btn btn-lg btn-success" href="{{route('howitworks')}}">Click here to Learn more</a>
            </div>
        </div>
    -->
    
    <div class="col-md-12 col-xl-7 mt-xl-5">
 
    <h1 class="heading-text">Your Request</h1> 
      
    <form action="{{route('requestitemstore')}}" method="post">
    @csrf
    <div class="form-group row">
    <label for="person_name" class="col-sm-4 col-form-label">Your Name</label>
    <div class="col-sm-8">
        <input type="text" class="form-control @error('person_name') is-invalid @enderror" id="person_name" name="person_name" value="{{old('person_name')}}"  placeholder="For added security only enter first name" required>
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
    <label for="asking_product" class="col-sm-4 col-form-label">What you like to request</label>
    <div class="col-sm-8">
     <textarea class="form-control @error('asking_product') is-invalid @enderror" id="asking_product" name="asking_product" rows="3" placeholder="Please explain what would you like to request" required="true">{{old('asking_product')}}</textarea>
    @error('asking_product')
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
      <legend class="col-form-label col-sm-4 pt-0">Can you afford to pay ?</legend>
      <div class="col-sm-8">
          
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="can_afford" id="can_afford_yes" value="1" {{ (old('can_afford') == '1') ? 'checked' : '' }} required> 
          <label class="form-check-label" for="can_afford_yes">
            Yes
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="can_afford" {{ (old('can_afford') == '0') ? 'checked' : '' }} id="can_afford_no" value="0">
          <label class="form-check-label" for="can_afford_no">
            No
          </label>
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
      <button type="submit" class="btn btn-lg btn-success">Request</button>
    </div>
  </div>
</form>
        </div>
    </div>
 
</div>



@endsection
