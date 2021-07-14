<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
<div class="flex justify-center p-4">
    <div>
        <h1 class="text-2xl my-4 font-bold text-center uppercase"> Repositorios </h1>
        <div class="max-w-2xl bg-white shadow-xl border-r border-gray-300">
            @foreach($repositories as $repository)
                <li class="flex items-center text-black p-2 hover:bg-gray-300">
                    <img src="{{ $repository->user->profile_photo_url }}" class="w-12 ht-12 rounded-full mr-2">
                    <div class="flex justify-between w-full">
                        <div class="flex-1">
                            <h2 class="text-sm font-semibold text-black">{{ $repository->url }}</h2>
                            <p>{{ $repository->description }}</p>
                        </div>
                        <span class="text-xs font-medium text-gray-600">{{ $repository->created_at->diffForHumans() }}</span>

                    </div>
                </li>

            @endforeach
                <hr>
                <div class="p-4 mt-2">
                    {{ $repositories->links() }}
                </div>

        </div>

    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
