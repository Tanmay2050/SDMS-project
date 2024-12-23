<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Default Title')</title>
    <!-- Updated CSS Path -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <!-- <h1>Header Section</h1> -->
    </header>

    <div>
         @yield('content')
    </div>

    <footer>
        <!-- <p>Footer Section</p> -->
    </footer>
</body>
</html>
