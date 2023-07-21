<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    @vite('resources/js/app.js')
    @inertiaHead
    <title>Document</title>
</head>
<body>
    <div class="container">
        @inertia 
    </div>
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.bundle.min.js') }}">
</body>
</html>