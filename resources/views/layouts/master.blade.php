<html>
    <head>
        @include('layouts.head')
        <title> @yield('title') Badan Eksekutif Mahasiswa Universitas Kristen Duta Wacana</title>
    </head>
    <body>
        <div class="loader"></div>
        @include('layouts.nav')
        <div class="bg-color-white col-md-12 col-xs-12 col-sm-12  pad-left-null pad-right-null pad-bot-large" style='min-height:79vh'>
            @yield('content')
        </div>
        @include('layouts.footer')
    </body>
</html>