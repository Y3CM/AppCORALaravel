<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout with PayPal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Checkout with PayPal</h1>
        
        <!-- Formulario para el pago -->
        <form action="{{ route('pago-paypal') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del comprador:</label>
                <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" readonly>
            </div>

            <div class="mb-3">
                <label for="cartTotal" class="form-label">Total del carrito:</label>
                <input type="text" class="form-control" id="cartTotal" value="{{ Cart::total() }}" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Pagar con PayPal</button>
        </form>
    </div>
</body>
</html>
