@component('mail::message')
# {{ $greeting }}

<?php echo $message 
?>

@if($button)
@component('mail::button', ['url' => $url])
Klik Disini
@endcomponent
@endif

<?php echo $closing
?>

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
