@component('mail::message')
# Introduction
{{ $content['title'] }}

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| PHP           | Centered      | $100     |
| Laravel       | Right-Aligned | $200     |
@endcomponent

@component('mail::button', ['url' => ''])
{{ $content['button'] }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
