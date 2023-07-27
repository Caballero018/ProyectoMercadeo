<p>Hola {{ $user->name }},</p>
<p>Por favor, haz clic en el siguiente enlace para verificar tu dirección de correo electrónico:</p>
<a href="{{ route('verification.verify', ['id' => $user->id, 'hash' => $user->password]) }}">Verificar correo electrónico</a>
