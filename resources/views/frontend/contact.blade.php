@extends('frontend.base.layout')
@section('content')
<form id="contact-form" method="post" action="contact.php" role="form">
<div class="container">
    <div class="messages"></div>

    <div class="controls">
            <div class="row">
            <div class="col-12">
                <h1>If you would like to contact and share your feedback use the below email </h1>
            </div>
                <div class="col-12">
                <h3 class="mt-5">Email - bastiyan@blymo.co.uk</h3>
                </div>
                <div class="col-12">
                <h3 class="mt-5">Phone - 07577134816 (Drop me a message)</h3>
                </div>
            </div>
    
    </div>
</div>
</form>
@endsection