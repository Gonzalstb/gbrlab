<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Kanban Style -->
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #183153 0%, #1e3a5c 100%);
            font-family: 'Figtree', 'Segoe UI', Arial, sans-serif;
        }
        .kanban-container {
            background: rgba(255,255,255,0.04);
            border-radius: 24px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            padding: 2rem 1rem;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-vh-100 d-flex flex-column">
        @include('layouts.navigation')
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-transparent shadow-none py-4">
                <div class="container">
                    {{ $header }}
                </div>
            </header>
        @endisset
        <!-- Page Content -->
        <main class="flex-fill d-flex flex-column justify-content-center align-items-center">
            <div class="container kanban-container w-100 my-4">
                @yield('content')
            </div>
        </main>
    </div>
    <!-- Bootstrap JS -->
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
