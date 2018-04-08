@component('mail::message')
# Activate your account

Klik link berikut untuk mengaktifkan akun anda.

@component('mail::button', ['url' => url('activation/' . $customer->activation_token) ])
Aktifkan!
@endcomponent

Thanks,

{{ config('app.name') }}
@endcomponent
