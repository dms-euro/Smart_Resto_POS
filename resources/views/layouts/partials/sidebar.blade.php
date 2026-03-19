 <aside class="w-72 bg-[#3d332b] text-[#e6ddd4] shadow-xl hidden md:block flex-shrink-0">
            <div class="p-6 border-b border-[#7c6b5a]/40">
                <div class="flex items-center gap-3">
                    <!-- BoxIcon: leaf -->
                    <i class='bx bx-leaf text-[#8fb08c] text-3xl'></i>
                    <span class="text-2xl font-semibold tracking-wide text-white">Warung <span
                            class="text-[#bdd6bd]">Daun</span></span>
                </div>
                <p class="text-xs text-[#cfc5b8] mt-1 ml-1">modern indonesian taste</p>
            </div>
            <nav class="p-5 space-y-2">
                <a href="{{ route('dashboard.index') }}"
                    class="flex items-center gap-4 py-3 px-4 text-[#e0d3c7] hover:bg-[#5f4d40] hover:text-white rounded-xl transition-colors">
                    <i class='bx bxs-dashboard'></i> Dashboard
                </a>
                <a href="{{ route('users.index') }}"
                    class="flex items-center gap-4 py-3 px-4 bg-[#7a9f7a]/30 text-white rounded-xl border-l-4 border-[#9fc99f] font-medium">
                    <i class='bx bxs-user-account'></i> Manajemen User
                </a>
                <a href="{{ route('kategori.index') }}"
                    class="flex items-center gap-4 py-3 px-4 text-[#e0d3c7] hover:bg-[#5f4d40] hover:text-white rounded-xl transition-colors">
                    <i class='bx bxs-category'></i> Kategori
                </a>
                <a href="#"
                    class="flex items-center gap-4 py-3 px-4 text-[#e0d3c7] hover:bg-[#5f4d40] hover:text-white rounded-xl transition-colors">
                    <i class='bx bxs-food-menu'></i> Menu
                </a>
                <a href="#"
                    class="flex items-center gap-4 py-3 px-4 text-[#e0d3c7] hover:bg-[#5f4d40] hover:text-white rounded-xl transition-colors">
                    <i class='bx bxs-report'></i> Laporan Transaksi
                </a>
            </nav>
            <div class="absolute bottom-6 left-6 text-[#bba891] text-sm flex items-center gap-2">
                <i class='bx bxs-user-circle text-xl'></i> <span>Admin · Warung Daun</span>
            </div>
        </aside>
