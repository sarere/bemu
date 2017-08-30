<html>
    <head>
        @include('layouts.head')
        <title> @yield('title') Badan Eksekutif Mahasiswa Universitas Kristen Duta Wacana</title>
    </head>
    <body>
        @include('layouts.nav')
        <div class="">
            @yield('content')
        </div>
        @include('layouts.footer')
    </body>
</html>