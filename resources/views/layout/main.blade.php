<html>
    <head>
        <title> @yield('title', $applicationName) </title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script arc="{{ mix('js/app.js') }}"> </script>
        <style>
            td{
                padding-right: 15px;
            }
        </style>
    </head>

    <body>
        <h1>{{ $applicationName }}</h1>
        <div class="sidebar">
            @section('sidebar')
                <ul>
                    <li><a href="#">...</a></li>
                </ul>
            @show   <!-- kończy sekcję i ją wyświetla -->
        </div>

    <hr>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
