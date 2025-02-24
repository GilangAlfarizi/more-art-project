<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Moreart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="{{ asset('/image/moreart-logo-alt.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col h-screen">
    <header class="flex justify-center fixed top-0 left-0 right-0 z-10">
        <div
            class="bg-blue-900 text-white-900 lg:my-10 my-6 flex justify-start font-lora w-fit rounded-3xl px-8 shadow-md">
            <img src="{{ URL::asset('/image/moreart-logo-alt.png') }}" alt="logo"
                class="w-8 h-8 mt-3 lg:mr-10 mr-6 object-contain">
            <a href="{{ url('/') }}">
                <p
                    class="my-2 py-2 lg:px-6 px-4 {{ Route::is('home.index') ? 'bg-gray-400/60 lg:rounded-3xl rounded-xl' : '' }}">
                    Home
                </p>
            </a>
            <a href="{{ route('home.works') }}">
                <p class="my-2 py-2 lg:px-6 px-4 {{ Route::is('home.works') ? 'bg-gray-400/60 rounded-3xl' : '' }}">
                    Works
                </p>
            </a>
            <a href="{{ route('home.about') }}">
                <p class="my-2 py-2 lg:px-6 px-4 {{ Route::is('home.about') ? 'bg-gray-400/60 rounded-3xl' : '' }}">
                    About
                </p>
            </a>
        </div>
    </header>
    <div>
        @yield('content')
    </div>
    <footer class="text-sm lg:text-md mt-8">
        <div class="bg-gray-200 py-10 flex lg:justify-between font-lora lg:px-72 md:px-52 sm:px-20">
            <p class="font-bold lg:mx-0 mx-4">2024 Moreart</p>
            <div class="flex lg:space-x-20 space-x-10">
                <div class="space-y-2">
                    <p class="font-bold">Elsewhere</p>
                    <p>CV</p>
                    <p>LinkedIn</p>
                </div>
                <div class="space-y-2">
                    <p class="font-bold">Contact</p>
                    <p>Whatsapp</p>
                    <p>Instagram</p>
                    <p>Email</p>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
<script>
    //message with toastr
    @if (session()->has('success'))
        toastr.success('{{ session('success') }}', 'Success!');
    @elseif (session()->has('error'))
        toastr.error('{{ session('error') }}', 'Fail!');
    @endif
</script>

</html>
