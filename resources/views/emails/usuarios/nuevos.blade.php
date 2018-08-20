@component('mail::message')
## Usuario nuevo

Se ha registrado un nuevo usuario en el sistema.

@component('mail::panel')
    ** Url: ** {{ url('/') }}
@endcomponent

@component('mail::panel')
    ** Usuario: ** {{ $user->username }}
@endcomponent

@component('mail::panel')
    ** Correo: ** {{ $user->email }}
@endcomponent

@component('mail::panel')
    ** Contraseña: ** {{ $user->password }}
@endcomponent

@component('mail::button', ['url' => url('/')])
Acceder
@endcomponent

Bienvenido,<br>
{{ $user->username . ' ' . $user->last_name . ' ' . $user->second_last_name }}
@endcomponent
