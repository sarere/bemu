@component('mail::message')
# {{ $greeting }}

<?php echo $message 
?>

@if($button)
@component('mail::button', ['url' => $url])
Klik Disini
@endcomponent
@endif

{{ $closing }}

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
