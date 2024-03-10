<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
</head>

<body class="font-inter w-full h-screen bg-v-accent">
    <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 px-5">
        @if (session('status') && session('code') == 500)
            <div class="bg-v-secondary text-error rounded text-sm font-medium py-1 ps-4 mb-2">
                {{ session('status') }}
            </div>
        @endif
        @if (session('status') && session('code') == 200)
            <div class="bg-v-secondary text-success rounded text-sm font-medium py-1 ps-4 mb-2">
                {{ session('status') }}
            </div>
        @endif
        <div class="container mx-auto bg-[rgb(0,0,0,.1)] p-2 rounded-sm px-4">
            <div class="mb-5">
                <h1 class="text-2xl text-center  font-semibold">xsyWA - @yield('title')</h1>
            </div>
            @yield('login')
            @yield('register')
        </div>
    </div>
</body>
<script>
        function showLoading() {
            var button = document.querySelector('button[type="submit"]');
            button.innerHTML = '<span class="loading loading-spinner loading-sm"></span>Process';
            button.disabled = true;
        }
</script>
</html>
