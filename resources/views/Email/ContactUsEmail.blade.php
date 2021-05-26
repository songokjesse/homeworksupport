@component('mail::message')
   From: # {{ $mailData['name'] }}
   <br/>
   Email: {{$mailData['email']}}
   <br>
   <hr/>
   <p>{{$mailData['message']}} </p>
   <br/>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
