<html>
    <head>
        @include('layouts.head')
        <title>Bemu - @yield('title')</title>
    </head>
    <body>
        @include('layouts.nav')
        <div class="">
            @yield('content')
        </div>
        @include('layouts.footer')
    </body>
</html>