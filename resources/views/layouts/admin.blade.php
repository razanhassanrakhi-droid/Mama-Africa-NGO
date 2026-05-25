<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','لوحة الإدارة')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon-org.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind (للتجربة) --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- خط --}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    {{-- CSS أساسي --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @stack('styles')
</head>

<body class="bg-slate-100 text-slate-800 min-h-screen font-[Cairo]">

    @include('admin.partials.header')

    <main class="container mx-auto px-4 py-6">
        @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-center">
        {{ session('success') }}
    </div>
@endif
        @yield('content')
    </main>


    {{-- JS أساسي --}}
    <script src="{{ asset('js/admin-base.js') }}"></script>

    @stack('scripts')
</body>
</html>
