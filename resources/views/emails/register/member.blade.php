@component('mail::message')
Selamat datang {{ $content['name'] }}, di generasi Nusantara.

@component('mail::table')
| pinCode       | Password      |
| ------------- |:-------------:|
| {{$content['pinCode']}}           | {{$content['password']}}      |
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
