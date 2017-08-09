@component('mail::message')
# Introduction

Selamat datang di Generasi Nusantara. Silahkan atur ulang password Anda

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
