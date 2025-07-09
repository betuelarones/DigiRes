<x-mail::message>
# ¡Pedido realizado con éxito!

Te confirmamos que hemos recibido tu pedido **#{{ $order->id }}** realizado el **{{ $order->created_at->format('d/m/Y \a \l\a\s H:i') }}**.

<x-mail::button :url="$url">
Ver mi pedido
</x-mail::button>

¡Gracias por confiar en {{ config('app.name') }}!

Saludos cordiales,<br>
**El equipo de {{ config('app.name') }}**
</x-mail::message>
