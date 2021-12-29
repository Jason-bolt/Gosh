@component('mail::message')
{{--# Introduction--}}
# {{ $contactData['first_name'] . ' ' . $contactData['last_name'] }}
{{ $contactData['email'] }}

{{ $contactData['message'] }}

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}
@endcomponent
