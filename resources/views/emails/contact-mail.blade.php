@component('mail::message')
Untuk Pelindo,<br>



{{$message}}

{{-- 
@component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent