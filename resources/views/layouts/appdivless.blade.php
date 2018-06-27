<!doctype html>
<html lang="{{ config('app.locale') }}">
 <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Laravel</title>
 
</head>
<body> 
@include('inc.navbar')
   
    @include ('inc.messages')
        @yield('content') 

</body>
   
</html>
