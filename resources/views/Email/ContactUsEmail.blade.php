@component('mail::message')
    # {{ $mailData['name'] }}

    {{$mailData['message']}}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
