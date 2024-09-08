<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar con Mercado Pago</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Proceso de Pago con Mercado Pago</h1>
        <p>Para completar tu compra, haz clic en el botón de abajo para ser redirigido a Mercado Pago.</p>

        <!-- Botón para iniciar el pago -->
        <form action="{{ route('pay-with-mercadopago') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Pagar con Mercado Pago</button>
        </form>
    </div>
</body>
</html>
