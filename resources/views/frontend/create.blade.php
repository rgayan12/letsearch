@extends('frontend.base.layout')
@section('content')
<div class="container mt-4">
    <div class="row h-100">
        <div class="col-md-4  mt-xl-5 col-xl-5">
            <h1 class="heading-text">Ones mans trash is another man tresure</h1>
        </div>
    <div class="col-md-8 col-xl-7 align-self-center mt-xl-5">
    <form action="{{route('item.store')}}" method="post">
    @csrf
    <div class="form-group row">
    <label for="person_name" class="col-sm-4 col-form-label">Your Name</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" id="person_name" name="person_name" placeholder="Your Name" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="phone_number" class="col-sm-4 col-form-label">Phone Number</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="This is how people will contact you" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="postcode" class="col-sm-4 col-form-label">Postcode</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="postcode" name="postcode" placeholder="This is how people will find things close to them" required>
    </div>
  </div>

   <div class="form-group row">
    <label for="sharing_product" class="col-sm-4 col-form-label">What you like to share</label>
    <div class="col-sm-8">
     <textarea class="form-control" id="sharing_product" name="sharing_product" rows="3" placeholder="Please explain what you like to share with 20 words" required="true"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="row">
      <label for="category_id" class="col-sm-4 col-form-label">Please select a category</label>
      <div class="col-sm-8">
        <select class="form-control" name="category_id" required="true">
            @foreach($categories as $key => $item)
                    <option value="{{ $key }}">{{ $item }}</option>
            @endforeach
        </select>
</div>
    </div>
  </div>


  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-4 pt-0">Do you expect something in return ?</legend>
      <div class="col-sm-8">
          
        <div class="form-check">
          <input class="form-check-input" type="radio" name="return_expected" id="return_expected" value="1" required> 
          <label class="form-check-label" for="return_expected">
            Yes
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="return_expected" id="gridRadios2" value="0">
          <label class="form-check-label" for="gridRadios2">
            No
          </label>
        </div>
        <textarea class="form-control" id="asking_product" name="asking_product" rows="3" placeholder="Please explain what you want in return with 20 words"></textarea>
     


      </div>
    </div>
  </fieldset>
  <div class="form-group row">
  <div class="alert alert-info" role="alert">
    <p> Please note that once you submit this form you will get a text message with a link to click to take this item off the platform </p>

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
