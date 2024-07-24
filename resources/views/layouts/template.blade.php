<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="{{asset('build/manifest.json')}}">
    <link rel="shortcut icon" href="{{ asset('images/CORA.png') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/25d245ab67.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
 <style>
        
        .loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

         .loader img {
            width: 70px;
            animation: bounce 1s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }
    </style>
<body>
    <header>
       @yield('header')
    </header>
    <div class="loader-wrapper" id="loader">
        <div class="loader">
            <img src="{{asset('images/CORA.png')}}" alt="Cora">
        </div>
    </div>
    <main>
        @yield('content')
    </main>

    <footer>
        @yield('footer')     
    </footer>
  <script>
        // Ocultar la pantalla de carga cuando la página esté completamente cargada
        window.addEventListener('load', function() {
            document.getElementById('loader').style.display = 'none';
        });
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">

if ("serviceWorker" in navigator) {
    navigator.serviceWorker
        .register("./sw.js")
        .then((registration) => {
            console.log("Service Worker registrado con éxito:", registration);
        })
        .catch((error) => {
            console.log("Error al registrar el Service Worker:", error);
        });
}

</script>
</html>