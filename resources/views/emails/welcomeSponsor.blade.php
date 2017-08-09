@component('mail::message')
# Introduction

Selamat datang di Generasi Nusantara. Terima kasih telah mensponsori

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
