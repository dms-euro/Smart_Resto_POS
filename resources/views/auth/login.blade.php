<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login · Warung Daun | POS Restoran</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite CSS & JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <!-- Box Icons CDN Resmi -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Inter font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        .bx { font-size: 1.25rem; vertical-align: middle; }

        /* Animasi fade in */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        /* Background pattern */
        .bg-pattern {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.05"><path d="M20 20 L30 20 L25 30 Z" fill="%233d332b"/><circle cx="70" cy="70" r="5" fill="%233d332b"/><circle cx="30" cy="80" r="3" fill="%237aa57a"/><path d="M80 30 L90 30 L85 40 Z" fill="%237aa57a"/></svg>');
            background-size: 100px 100px;
        }
    </style>
</head>
<body class="bg-[#f8f5f2] text-gray-700 antialiased min-h-screen flex items-center justify-center p-4 bg-pattern">

    <!-- Container Utama -->
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden fade-in">
        <div class="flex flex-col md:flex-row">

            <!-- LEFT SIDE - Branding & Ilustrasi -->
            <div class="md:w-1/2 bg-gradient-to-br from-[#3d332b] to-[#5f4d40] p-8 md:p-12 flex flex-col justify-between">
                <div>
                    <!-- Logo -->
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 bg-[#8fb08c] rounded-2xl flex items-center justify-center">
                            <i class='bx bx-leaf text-white text-3xl'></i>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-white">Warung <span class="text-[#bdd6bd]">Daun</span></span>
                            <p class="text-xs text-[#cfc5b8]">modern indonesian taste</p>
                        </div>
                    </div>

                    <!-- Ilustrasi & Quotes -->
                    <div class="mt-12">
                        <div class="relative">

                            <h2 class="text-2xl font-bold text-white mb-4">Sistem POS Restoran Terintegrasi</h2>
                            <p class="text-[#e0d3c7] leading-relaxed">
                                Kelola pesanan, reservasi, laporan, dan dapur dalam satu platform.
                                Dengan nuansa Indonesia yang modern dan hangat.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Footer kiri -->
                <div class="mt-8 text-xs text-[#a5927e]">
                    © 2026 Warung Daun. All rights reserved.
                </div>
            </div>

            <!-- RIGHT SIDE - FORM LOGIN -->
            <div class="md:w-1/2 p-8 md:p-12 bg-white">
                <div class="max-w-sm mx-auto">
                    <!-- Header Form -->
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-[#7aa57a]/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class='bx bx-log-in-circle text-[#7aa57a] text-3xl'></i>
                        </div>
                        <h2 class="text-2xl font-bold text-[#3d332b]">Selamat Datang</h2>
                        <p class="text-gray-500 text-sm mt-1">Silakan login untuk mengakses dashboard</p>
                    </div>

                    <!-- Form Login -->
                    <form action="{{ route('login') }}" method="POST" class="space-y-6">
                        @csrf
                        <!-- Input Email/Username -->
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-2">
                                <i class='bx bx-envelope align-middle mr-1'></i> Email
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-400">
                                    <i class='bx bx-user'></i>
                                </span>
                                <input type="text" id="username" name="email"
                                    class="w-full pl-10 pr-4 py-3 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30 focus:border-[#7aa57a] outline-none transition"
                                    placeholder="Masukkan email">
                            </div>
                        </div>

                        <!-- Input Password -->
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-2">
                                <i class='bx bx-lock-alt align-middle mr-1'></i> Password
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-400">
                                    <i class='bx bx-lock'></i>
                                </span>
                                <input type="password" id="password" name="password"
                                    class="w-full pl-10 pr-12 py-3 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30 focus:border-[#7aa57a] outline-none transition"
                                    placeholder="Masukkan password">
                                <button type="submit" class="absolute right-3 top-3 text-gray-400 hover:text-[#7aa57a]">
                                    <i class='bx bx-hide' id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-[#7aa57a] bg-white border-[#ddd0c4] rounded focus:ring-[#7aa57a]/30">
                                <span class="text-sm text-gray-600">Ingat saya</span>
                            </label>
                            <a href="#" class="text-sm text-[#7aa57a] hover:text-[#689268] hover:underline">
                                Lupa password?
                            </a>
                        </div>

                        <!-- Tombol Login -->
                        <button type="submit"
                            class="w-full bg-[#7aa57a] text-white py-3 rounded-xl hover:bg-[#689268] transition flex items-center justify-center gap-2 text-lg font-medium shadow-md hover:shadow-lg">
                            <i class='bx bx-log-in'></i> Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
