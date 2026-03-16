<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Warung Daun')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite CSS & JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <!-- Box Icons CDN Resmi (v2.1.0) -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Inter font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
            background-color: #f8f5f2;
        }
    </style>
</head>

<body class="text-gray-700 antialiased">

    <!-- LAYOUT -->
    <div class="flex h-screen overflow-hidden">
        <!-- SIDEBAR-->
        @include('layouts.sidebar')

        <!-- MAIN-->
        <main class="flex-1 overflow-y-auto p-6 md:p-8 bg-[#f8f5f2]">
            <!-- CONTENT -->
            @yield('content')

            <!-- FOOTER -->
            @include('layouts.footer')
        </main>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>
