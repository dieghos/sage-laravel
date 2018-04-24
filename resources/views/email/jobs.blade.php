@component('mail::message')
# Trabajo creado

Se le ha asignado un nuevo trabajo.

@component('mail::button', ['url' => $url])
Ver expediente
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
