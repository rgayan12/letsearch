<html>
Dear {{ ucwords($details->name) }}, <br>

Thank you for your inquiry<br>

A member of our team will be in touch with you shortly <br>

<p>Your Inquiry Details</p>
 Your Name  : {{ $details->name }} <br>
 Your Email : {{ $details->email }} <br>
 Subject : {{ $details->subject }}<br>
 Message : {{ $details->message }} <br>


Best wishes,<br>
{{$details->sender}}, <br>
