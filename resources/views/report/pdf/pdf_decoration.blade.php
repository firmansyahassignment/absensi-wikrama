<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://localhost/doc/bs4/dist/css/bootstrap.css">
    <style>
        *{
            font-family: sans-serif;
        }

        .text-header{
            font-weight: normal;
        }

        .brand{
            font-weight: bold;
        }

        table{
            font-size: 12px !important;
        }

        p{
            font-size: 12px !important;
        }

        #diunduhpada{
            font-size: 8px !important;
        }
    </style>
</head>
<body>
    <div class="text-center">
        <h4><span class="font-weight-bold">ABSENSI WIKRAMA</span></h4>
        <h5><span class="font-weight-normal">@yield('header')</span></h5>
    </div>
    <hr>
    <br>
    @yield('content')
</body>
</html>