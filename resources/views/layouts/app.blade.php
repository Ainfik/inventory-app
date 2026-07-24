<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Dashboard')
        -
        {{ config('app.name', 'Inventory IMS') }}
    </title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body
    class="bg-[radial-gradient(circle_at_top_left,_rgba(16,185,129,0.16),_transparent_35%),linear-gradient(180deg,#f8fafc_0%,#f1f5f9_100%)] font-[Inter] antialiased text-slate-800">

<div
    x-data="{

        sidebarOpen:true

    }"

    class="min-h-screen">

    {{-- SIDEBAR --}}

    @include('partials.sidebar')

    {{-- CONTENT --}}

    <div
        class="lg:ml-72 transition-all duration-300">

        {{-- NAVBAR --}}

        @include('partials.navbar')

        {{-- PAGE --}}

        <main
            class="p-4 sm:p-6 lg:p-8">

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>