@component('mail::message')
   From: Email: {{$mailData['email']}}
   <br/>

   <br>
   <hr/>
   <p>{{$mailData['message']}} </p>
   <br/>

    Thanks,<br>
   {{ $mailData['name'] }}
@endcomponent
