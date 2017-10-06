@component('mail::message')
# {{ $greeting }}

<?php echo $message 
?>

@if(false)
@component('mail::button', ['url' => ''])
Button Text
@endcomponent
@endif

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
