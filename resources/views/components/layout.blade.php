<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

</head>
<body class="bg-slate-200 max-w-3xl mx-auto w-[90%] my-10 ">
<nav class="flex justify-between items-center font-2xl font-bold mb-8">
    <ul>
        <li>
            <a href="{{route('jobs.index')}}">Home</a>
        </li>
    </ul>
    <ul class="flex items-center space-x-6">
        @auth
            <li>
                <a href="{{route('my-job-applications.index')}}">
                    My Applications
                </a>
            </li>
        <li>
            <a href="{{route('my-jobs.index')}}">My Jobs</a>
        </li>
            <li class="flex space-x-2 items-center">
                <div>{{ auth()->user()->name }}</div>
                <form action="{{route('auth.destroy', auth()->user())}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class=" bg-black px-2 py-1 rounded-md shadow  text-white">Logout</button>
                </form>
            </li>
        @else
            <li>
                <a href="{{route('auth.create')}}" class=" bg-black px-2 py-1 rounded-md shadow  text-white">Login</a>
            </li>
        @endauth
    </ul>
</nav>
@if(session('success'))
    <div role="alert"
         class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-800">
        <p class="font-bold">Success!</p>
        <p>{{session('success')}}</p>
    </div>
@endif
@if(session('error'))
    <div role="alert"
         class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-800">
        <p class="font-bold">Error!</p>
        <p>{{session('error')}}</p>
    </div>
@endif
{{$slot}}
</body>
</html>
