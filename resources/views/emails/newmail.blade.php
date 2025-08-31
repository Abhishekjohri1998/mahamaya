@component('mail::message')
# {{ $demo->greeting }}

{{ $demo->message }}

**Date:** {{ $demo->date->format('F j, Y, g:i a') }}

@component('mail::button', ['url' => config('app.url')])
Access Your Account
@endcomponent

Thanks,<br>
{{ $demo->sender }}
@endcomponent
