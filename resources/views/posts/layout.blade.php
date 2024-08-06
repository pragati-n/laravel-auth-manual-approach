<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src=" {{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src=" {{ asset('js/script.js') }}"></script>
    <title>First Laravel CRUD project</title>
</head>
<body>
    <div class="container" style="margin:15px;">
        @yield('content')
    </div>
    
</body>
</html>