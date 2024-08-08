<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Vision Games</title>

</head>
<body>
    
    @vite('resources/css/bootstrap.min.css')
    @vite('resources/css/templatemo-cyborg-gaming.css')
    @vite('resources/css/animate.css')
    @vite('resources/css/flex-slider.css')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    @vite('resources/css/owl.css')
        
    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
    <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    @vite('resources/js/isotope.js')
    @vite('resources/js/owl-carousel.js')
    @vite('resources/js/tabs.js')
    @vite('resources/js/popup.js')
    @vite('resources/js/custom.js')
        <!-- Additional CSS Files -->
</body>
</html>