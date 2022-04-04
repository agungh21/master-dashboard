<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>

    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/all.css') }}">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    @yield('content')
</body>
<!-- javascript -->
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/font-awesome/all.js') }}"></script>

</html>
