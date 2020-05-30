<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}> --}}
        <link rel="stylesheet" href={{asset('css/app.css')}}>
        {{-- <link rel="stylesheet" href={{asset('css/css/fontawesome.min.css')}}> --}}
        <title>{{ env('APP_NAME','KaramProject')}}</title>
    </head>
    <body>
        @include('includes.navbar')
        <div class="mb-3"></div>
        <div class="container">
            @include('includes.messages')
            @yield('content')
            {{-- @include('includes.footer') --}}
        </div>
        
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>