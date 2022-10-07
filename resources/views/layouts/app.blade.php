<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/app/css') }}">
    @vite('resources/js/app.js')

</head>
{{-- <body>
    @yield('content')
</body> --}}


<body class="bg-gray-200">
    <nav class= "p-6 bg-white flex justify-between">
        <ul class="flex items-center">
            <li>
                <a href="" class="p-3">home</a>
            </li>
            <li>
                <a href="" class="p-3">Dashboard
                    </a></li>
            <li>
                <a href="" class="p-3">posts</a>
            </li>

        </ul>

        <ul class="flex items-center">
            @if (auth()->user())
                <li>
                    <a href="" class="p-3">Youssef gh</a></li>
                
                <li>
                    <a href="" class="p-3">Logout</a>
                </li>
            
            @else
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                {{-- this will pick up the name passed in route 'register' even if we change the /route t--}}
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li> 
                
            @endif


        </ul>
    </nav>
    @yield('content')

    
</body>

</html>