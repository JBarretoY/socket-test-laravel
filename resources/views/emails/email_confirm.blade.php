hola {{ $name }} para poder acceder al sistema debe confirmar la cuenta con este link
<a href="{{ url('user/confirm-account/'.$token) }}">Confirmar cuenta</a>
