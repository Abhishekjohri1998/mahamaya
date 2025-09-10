@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
@if($settings->logo)
    <img src="{{ asset('storage/'. $settings->logo) }}" alt="{{ config('app.name') }}" style="width: 90px; display: block;">
@else
    <div style="font-size: 24px; font-weight: bold; text-align: center; padding: 20px; color: #333;">
        {{ config('app.name') }}
    </div>
@endif
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
