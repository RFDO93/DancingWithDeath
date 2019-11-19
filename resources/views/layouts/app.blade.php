<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .dayBox{
            width: 14.2%;
            height: 113px;
            border: 1px solid #ddd ;
        }
        .dateBox{
            width: 70vw;
            display: flex;
            flex-wrap: wrap;
            cursor: pointer;
        }
        .block{
            background: #b9bbbe;
            cursor: auto;

        }
        .dayHeader{
            display: flex;
            width: 70vw;
            height: 30px;
        }
        .nameDay{
            width: 14.2%;
            text-align: center;
            font-size: 20px;
            font-weight: 900;
        }
        .boxHorusDetail{
            width: 100%;
            height: 40px;
            background-color:#F2F4F4;
            cursor: pointer;
            justify-content: center;
            align-items: center;
            display: flex;
            margin-bottom: 10px;
        }
        .boxHorusDetailActive{
            background-color:#D1F2EB;
        }
        .boxHorusDetailDes{
            width: 100%;
            height: 40px;
            background-color:#FADBD8;
            justify-content: center;
            align-items: center;
            display: flex;
            margin-bottom: 10px;
        }
        .approintment{
            margin-bottom: 10px;
            background: #D6EAF8;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>


                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
