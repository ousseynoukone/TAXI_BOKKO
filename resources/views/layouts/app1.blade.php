<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('build/assets/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/style.css') }}" rel="stylesheet">
    <title>TAXI BOKO</title>
</head>
<body class="bg-dark">
    <div class="container" >
        @yield('content')
  
      </div>
    
</body>
<script src="{{ asset('build/assets/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('build/assets/bootstrap.js') }}"></script>
<script src="{{ asset('build/assets/script.js') }}"></script>
</html>