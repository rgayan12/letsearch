@extends('frontend.base.layout')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-6">
                
                <div class="contact-us-content p-4">
                    <h1 class="contact-us-header">Get in touch</h1>
                    <!--
                     <br>
                      Phone <i class="fas fa-phone fa-1x sicon"></i> <br />01895 619 900
                    -->
                </div>
                <form action="{{route('contactusSend')}}" method="post" name="frmcontactus">
                    @csrf
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
                                        <input type="text" placeholder="Name *" class="form-control" required="" name="name">
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input type="email" placeholder="Email *" class="form-control" required="" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Subject" class="form-control" required name="subject">
                            </div>
                            <div class="form-group">
                            <textarea name="message" id="" placeholder="Message *" class="form-control border w-100 p-3 mt-4" rows="6" placeholder="Please leve your contact number if you want in here"></textarea>
                        </div>
                            <div class="btn-grounp">
                                <button type="submit" class="btn btn-primary mt-2 float-right">SUBMIT</button>
                            </div>


                        </fieldset>
                        <input type="hidden" name="recaptcha" id="recaptcha">

                    </form>

                      @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                     @endif
            </div>
            <div class="col-md-6">
            <div class="contact-us-content p-4">
                    <h1 class="contact-us-header">Or Email us at</h1>
                    <p class="lead">bastiyan@blymo.co.uk</p>

                    <h2>If you are a authorised representative of an institution that would like to help people please get in touch and we will arrange the best we can ASAP</h2>
                    <!--
                     <br>
                      Phone <i class="fas fa-phone fa-1x sicon"></i> <br />01895 619 900
                    -->
                </div>
            </div>
        </div></div>
@endsection