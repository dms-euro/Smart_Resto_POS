@extends('layouts.app')
@section('title', 'Menu | Warung Daun')
@section('content')

<div>
     <main class="flex-1 overflow-y-auto p-6 md:p-8 bg-[#f8f5f2]">
            <!-- header -->
            <div class="flex flex-wrap items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-[#3d332b] flex items-center gap-3">
                        <i class='bx bxs-food-menu text-[#7aa57a]'></i> Manajemen Menu
                        <span class="text-sm bg-[#e0d6cc] text-[#4a3f37] px-3 py-1 rounded-full font-normal">126 menu</span>
                    </h1>
                    <p class="text-[#8b7a6b] mt-1 flex items-center gap-2">
                        <i class='bx bx-dish text-[#7aa57a]'></i> Kelola daftar menu, harga, foto, dan status
                    </p>
                </div>
                <!-- Tombol Tambah Menu -->
                <button data-modal-target="addMenuModal" data-modal-toggle="addMenuModal"
                    class="bg-[#7aa57a] text-white rounded-full px-6 py-2.5 text-sm shadow-md flex items-center gap-2 hover:bg-[#689268] transition-colors mt-4 sm:mt-0">
                    <i class='bx bx-plus-circle'></i> Tambah Menu Baru
                </button>
            </div>

            <!-- FILTER & SEARCH -->
            <div class="flex flex-wrap gap-3 mb-6 items-center justify-between">
                <div class="flex gap-2 flex-wrap">
                    <span class="bg-white border border-[#ddd0c4] rounded-full px-5 py-2 text-sm flex items-center gap-2 cursor-pointer hover:bg-gray-50">
                        <i class='bx bx-filter-alt text-[#7aa57a]'></i> Semua Kategori
                    </span>
                    <span class="bg-white border border-[#ddd0c4] rounded-full px-5 py-2 text-sm flex items-center gap-2 cursor-pointer hover:bg-gray-50">
                        <i class='bx bx-check-circle text-[#7aa57a]'></i> Tersedia
                    </span>
                    <span class="bg-white border border-[#ddd0c4] rounded-full px-5 py-2 text-sm flex items-center gap-2 cursor-pointer hover:bg-gray-50">
                        <i class='bx bx-x-circle text-[#b48b5a]'></i> Habis
                    </span>
                </div>
                <div class="relative">
                    <i class='bx bx-search absolute left-4 top-3 text-[#8b7a6b] text-sm'></i>
                    <input type="text" placeholder="Cari menu..." class="pl-10 pr-5 py-2 rounded-full border border-[#ddd0c4] bg-white text-sm w-64 focus:outline-none focus:ring-2 focus:ring-[#7aa57a]/30">
                </div>
            </div>

            <!-- STATISTIK CARD MENU -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-xl border border-[#e5d9d0] p-4 flex items-center gap-3">
                    <div class="w-12 h-12 bg-[#e9f0e9] rounded-full flex items-center justify-center text-[#6f9e6f]">
                        <i class='bx bx-food-menu text-2xl'></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Total Menu</p>
                        <p class="text-xl font-bold text-[#3d332b]">126</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-[#e5d9d0] p-4 flex items-center gap-3">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <i class='bx bx-check-circle text-2xl'></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Tersedia</p>
                        <p class="text-xl font-bold text-[#3d332b]">92</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-[#e5d9d0] p-4 flex items-center gap-3">
                    <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center text-amber-600">
                        <i class='bx bx-x-circle text-2xl'></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Habis</p>
                        <p class="text-xl font-bold text-[#3d332b]">34</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-[#e5d9d0] p-4 flex items-center gap-3">
                    <div class="w-12 h-12 bg-[#f7ede2] rounded-full flex items-center justify-center text-[#b48b5a]">
                        <i class='bx bx-category text-2xl'></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Kategori</p>
                        <p class="text-xl font-bold text-[#3d332b]">4</p>
                    </div>
                </div>
            </div>

            <!-- TABEL MENU (GRID VIEW / CARD VIEW agar lebih menarik dan bisa foto) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                <!-- Card Menu 1 - Nasi Goreng -->
                <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] overflow-hidden hover:shadow-md transition">
                    <div class="h-40 bg-[#e0d6cc] relative flex items-center justify-center text-[#8b7a6b]">
                        <!-- Placeholder foto dengan icon -->
                        <i class='bx bx-image-alt text-6xl opacity-30'></i>
                        <span class="absolute bottom-2 right-2 bg-white/80 text-xs px-2 py-1 rounded-full">📷 foto</span>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-[#3d332b] text-lg">Nasi Goreng Spesial</h3>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Tersedia</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Nasi goreng dengan ayam suwir dan telur</p>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-sm bg-[#f8f5f2] px-3 py-1 rounded-full">Makanan Utama</span>
                            <span class="font-bold text-[#3d332b]">Rp 35.000</span>
                        </div>
                        <div class="flex justify-end gap-2 border-t border-[#f0e7df] pt-3">
                            <button data-modal-target="editMenuModal" data-modal-toggle="editMenuModal"
                                onclick="populateEditMenu(1)"
                                class="text-[#7aa57a] hover:text-[#5a805a] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button onclick="confirmDeleteMenu(1)" class="text-[#b48b5a] hover:text-[#8e6943] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card Menu 2 - Es Teh -->
                <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] overflow-hidden hover:shadow-md transition">
                    <div class="h-40 bg-[#f7ede2] relative flex items-center justify-center text-[#b48b5a]">
                        <i class='bx bx-image-alt text-6xl opacity-30'></i>
                        <span class="absolute bottom-2 right-2 bg-white/80 text-xs px-2 py-1 rounded-full">📷 foto</span>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-[#3d332b] text-lg">Es Teh Manis</h3>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Tersedia</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Teh hitam dengan gula asli</p>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-sm bg-[#f8f5f2] px-3 py-1 rounded-full">Minuman</span>
                            <span class="font-bold text-[#3d332b]">Rp 8.000</span>
                        </div>
                        <div class="flex justify-end gap-2 border-t border-[#f0e7df] pt-3">
                            <button data-modal-target="editMenuModal" data-modal-toggle="editMenuModal"
                                onclick="populateEditMenu(2)"
                                class="text-[#7aa57a] hover:text-[#5a805a] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button onclick="confirmDeleteMenu(2)" class="text-[#b48b5a] hover:text-[#8e6943] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card Menu 3 - Pisang Goreng -->
                <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] overflow-hidden hover:shadow-md transition">
                    <div class="h-40 bg-[#f7ede2] relative flex items-center justify-center text-[#b48b5a]">
                        <i class='bx bx-image-alt text-6xl opacity-30'></i>
                        <span class="absolute bottom-2 right-2 bg-white/80 text-xs px-2 py-1 rounded-full">📷 foto</span>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-[#3d332b] text-lg">Pisang Goreng</h3>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Tersedia</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Pisang kepok goreng dengan topping cokelat</p>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-sm bg-[#f8f5f2] px-3 py-1 rounded-full">Snack</span>
                            <span class="font-bold text-[#3d332b]">Rp 15.000</span>
                        </div>
                        <div class="flex justify-end gap-2 border-t border-[#f0e7df] pt-3">
                            <button data-modal-target="editMenuModal" data-modal-toggle="editMenuModal"
                                onclick="populateEditMenu(3)"
                                class="text-[#7aa57a] hover:text-[#5a805a] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button onclick="confirmDeleteMenu(3)" class="text-[#b48b5a] hover:text-[#8e6943] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card Menu 4 - Sate Ayam -->
                <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] overflow-hidden hover:shadow-md transition">
                    <div class="h-40 bg-[#e0d6cc] relative flex items-center justify-center text-[#8b7a6b]">
                        <i class='bx bx-image-alt text-6xl opacity-30'></i>
                        <span class="absolute bottom-2 right-2 bg-white/80 text-xs px-2 py-1 rounded-full">📷 foto</span>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-[#3d332b] text-lg">Sate Ayam</h3>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Tersedia</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">10 tusuk sate ayam dengan bumbu kacang</p>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-sm bg-[#f8f5f2] px-3 py-1 rounded-full">Makanan Utama</span>
                            <span class="font-bold text-[#3d332b]">Rp 45.000</span>
                        </div>
                        <div class="flex justify-end gap-2 border-t border-[#f0e7df] pt-3">
                            <button data-modal-target="editMenuModal" data-modal-toggle="editMenuModal"
                                onclick="populateEditMenu(4)"
                                class="text-[#7aa57a] hover:text-[#5a805a] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button onclick="confirmDeleteMenu(4)" class="text-[#b48b5a] hover:text-[#8e6943] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card Menu 5 - Kopi Tubruk (Habis) -->
                <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] overflow-hidden hover:shadow-md transition opacity-80">
                    <div class="h-40 bg-[#f7ede2] relative flex items-center justify-center text-[#b48b5a]">
                        <i class='bx bx-image-alt text-6xl opacity-30'></i>
                        <span class="absolute bottom-2 right-2 bg-white/80 text-xs px-2 py-1 rounded-full">📷 foto</span>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-[#3d332b] text-lg">Kopi Tubruk</h3>
                            <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs">Habis</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Kopi hitam khas Indonesia</p>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-sm bg-[#f8f5f2] px-3 py-1 rounded-full">Minuman</span>
                            <span class="font-bold text-[#3d332b]">Rp 12.000</span>
                        </div>
                        <div class="flex justify-end gap-2 border-t border-[#f0e7df] pt-3">
                            <button data-modal-target="editMenuModal" data-modal-toggle="editMenuModal"
                                onclick="populateEditMenu(5)"
                                class="text-[#7aa57a] hover:text-[#5a805a] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button onclick="confirmDeleteMenu(5)" class="text-[#b48b5a] hover:text-[#8e6943] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card Menu 6 - Es Cendol -->
                <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] overflow-hidden hover:shadow-md transition">
                    <div class="h-40 bg-[#f7ede2] relative flex items-center justify-center text-[#b48b5a]">
                        <i class='bx bx-image-alt text-6xl opacity-30'></i>
                        <span class="absolute bottom-2 right-2 bg-white/80 text-xs px-2 py-1 rounded-full">📷 foto</span>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-[#3d332b] text-lg">Es Cendol</h3>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Tersedia</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Minuman tradisional dengan gula merah</p>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-sm bg-[#f8f5f2] px-3 py-1 rounded-full">Minuman</span>
                            <span class="font-bold text-[#3d332b]">Rp 18.000</span>
                        </div>
                        <div class="flex justify-end gap-2 border-t border-[#f0e7df] pt-3">
                            <button data-modal-target="editMenuModal" data-modal-toggle="editMenuModal"
                                onclick="populateEditMenu(6)"
                                class="text-[#7aa57a] hover:text-[#5a805a] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button onclick="confirmDeleteMenu(6)" class="text-[#b48b5a] hover:text-[#8e6943] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                <i class='bx bxs-trash'></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PAGINATION -->
            <div class="flex justify-between items-center mt-8 px-2 text-sm text-[#8b7a6b]">
                <span>Menampilkan 1-6 dari 126 menu</span>
                <div class="flex gap-2">
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">
                        <i class='bx bx-chevron-left text-xs'></i>
                    </span>
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#7aa57a] text-white">1</span>
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">2</span>
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">3</span>
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">4</span>
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">5</span>
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">
                        <i class='bx bx-chevron-right text-xs'></i>
                    </span>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="mt-8 text-sm text-[#8b7a6b] flex justify-between items-center border-t border-[#e0d3c7] pt-5">
                <span><i class='bx bx-leaf text-[#7aa57a] mr-1'></i> Warung Daun · Manajemen Menu</span>
                <span><i class='bx bx-time'></i> Terakhir update: 16 Mar 2026 11:30</span>
            </div>
        </main>
</div>

<div>
     <!-- FLOWBITE MODAL: ADD MENU -->
    <div id="addMenuModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-2xl shadow-lg border border-[#e5d9d0]">
                <div class="flex items-center justify-between p-4 md:p-5 border-b border-[#e5d9d0] rounded-t-2xl">
                    <h3 class="text-xl font-semibold text-[#3d332b] flex items-center gap-2">
                        <i class='bx bx-dish text-[#7aa57a]'></i> Tambah Menu Baru
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="addMenuModal">
                        <i class='bx bx-x text-xl'></i>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form onsubmit="event.preventDefault(); saveMenu();" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Nama Menu <span class="text-red-400">*</span></label>
                                <input type="text" class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30" placeholder="contoh: Nasi Goreng">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Kategori</label>
                                <select class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">
                                    <option>Makanan Utama</option>
                                    <option>Minuman</option>
                                    <option>Snack</option>
                                    <option>Sushi & Jepang</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Deskripsi</label>
                            <textarea rows="2" class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30" placeholder="Deskripsi menu..."></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Harga <span class="text-red-400">*</span></label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                                    <input type="text" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30" placeholder="35000">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Status</label>
                                <select class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">
                                    <option selected>Tersedia</option>
                                    <option>Habis</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Upload Foto Menu</label>
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-[#ddd0c4] rounded-xl bg-[#f8f5f2] cursor-pointer hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <i class='bx bx-cloud-upload text-3xl text-[#7aa57a]'></i>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag & drop</p>
                                        <p class="text-xs text-gray-400">PNG, JPG, WEBP (max. 2MB)</p>
                                    </div>
                                    <input type="file" class="hidden" accept="image/*" />
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 mt-6">
                            <button type="button" data-modal-hide="addMenuModal" class="px-5 py-2 rounded-full border border-[#ddd0c4] text-[#5f4d40] hover:bg-gray-50 transition">Batal</button>
                            <button type="submit" class="px-5 py-2 rounded-full bg-[#7aa57a] text-white hover:bg-[#689268] transition flex items-center gap-2">
                                <i class='bx bx-check-circle'></i> Simpan Menu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FLOWBITE MODAL: EDIT MENU -->
    <div id="editMenuModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-2xl shadow-lg border border-[#e5d9d0]">
                <div class="flex items-center justify-between p-4 md:p-5 border-b border-[#e5d9d0] rounded-t-2xl">
                    <h3 class="text-xl font-semibold text-[#3d332b] flex items-center gap-2">
                        <i class='bx bxs-edit text-[#7aa57a]'></i> Edit Menu
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="editMenuModal">
                        <i class='bx bx-x text-xl'></i>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form onsubmit="event.preventDefault(); updateMenu();" class="space-y-4">
                        <input type="hidden" id="editMenuId">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Nama Menu</label>
                                <input type="text" id="editMenuName" class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30" value="Nasi Goreng Spesial">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Kategori</label>
                                <select id="editMenuCategory" class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">
                                    <option>Makanan Utama</option>
                                    <option>Minuman</option>
                                    <option>Snack</option>
                                    <option>Sushi & Jepang</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Deskripsi</label>
                            <textarea id="editMenuDesc" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">Nasi goreng dengan ayam suwir dan telur</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Harga</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                                    <input type="text" id="editMenuPrice" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30" value="35000">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Status</label>
                                <select id="editMenuStatus" class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">
                                    <option>Tersedia</option>
                                    <option>Habis</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Ganti Foto</label>
                            <div class="flex items-center gap-3">
                                <div class="w-16 h-16 bg-[#e0d6cc] rounded-lg flex items-center justify-center">
                                    <i class='bx bx-image-alt text-3xl text-[#8b7a6b]'></i>
                                </div>
                                <div class="flex-1">
                                    <label class="flex flex-col items-center justify-center w-full h-20 border-2 border-dashed border-[#ddd0c4] rounded-xl bg-[#f8f5f2] cursor-pointer hover:bg-gray-100">
                                        <div class="flex items-center gap-2">
                                            <i class='bx bx-cloud-upload text-xl text-[#7aa57a]'></i>
                                            <span class="text-sm text-gray-500">Klik untuk upload foto baru</span>
                                        </div>
                                        <input type="file" class="hidden" accept="image/*" />
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 mt-6">
                            <button type="button" data-modal-hide="editMenuModal" class="px-5 py-2 rounded-full border border-[#ddd0c4] text-[#5f4d40] hover:bg-gray-50 transition">Batal</button>
                            <button type="submit" class="px-5 py-2 rounded-full bg-[#7aa57a] text-white hover:bg-[#689268] transition flex items-center gap-2">
                                <i class='bx bx-check-circle'></i> Perbarui Menu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
