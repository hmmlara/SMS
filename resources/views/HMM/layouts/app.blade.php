<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HMM</title>

    <link rel="shortcut icon" href="{{ asset('img/HMM-logo.jpg') }}" type="image/jpg">

    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/datatable.min.css') }}">

    {{-- script --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/datatable.min.js') }}"></script>

    @if (request()->segment(2) != 'home')
        <style>
            .nav-icon{
                transition: all 5s ease;
                width: 20px;
                text-decoration: none;
            }
            .nav-icon i{
                width: 100%;
                height: auto;
            }
            .nav-icon i:nth-child(2){
                display: none;
            }
            .nav-icon:hover i:nth-child(1){
                display: none;
            }
            .nav-icon:hover i:nth-child(2){
                display: block;
            }
        </style>
    @endif
</head>

<body>

    @include('HMM.layouts.partials.nav')

    <main class="container">
        @yield('content')
    </main>
</body>

</html>
