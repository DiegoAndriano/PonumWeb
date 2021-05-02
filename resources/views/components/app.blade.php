<!doctype html>
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
</head>
<body>
<div id="app" class="bg-gray-50">
    <div class="max-w-screen-lg mx-auto bg-gray-50">
        <nav class="flex justify-between py-10 px-14">
            <p>Ponum</p>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="transition translate hover:rotate-45 w-5 h-2 text-black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <g class="stroke-current">
                        <line x1="4" y1="8" x2="20" y2="8" />
                    </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-2 text-black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <g class="stroke-current">
                        <line x1="4" y1="8" x2="20" y2="8" />
                    </g>
                </svg>
            </div>
        </nav>

        <main class="py-4">
            {{ $slot }}
        </main>
    </div>

</div>
</body>
</html>
