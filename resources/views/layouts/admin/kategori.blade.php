@extends('layouts.app')
@section('tiltle', 'Kategori | Dapur Nusantara')
@section('content')

    <!-- ========== HALAMAN MANAJEMEN KATEGORI ========== -->
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">

        <!-- Judul Halaman & Tombol Tambah -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-[#4d3e2f] flex items-center gap-3">
                    <i class='bx bx-category text-[#5f7b5a]'></i>
                    Manajemen Kategori
                </h1>
                <p class="text-stone-600 mt-2">Kelola kategori menu (Makanan, Minuman, Paket Keluarga, dll.)</p>
            </div>

            <!-- Tombol Tambah Kategori (Create) -->
            <button onclick="document.getElementById('modalTambah').classList.remove('hidden')"
                class="bg-[#2f5e3a] hover:bg-[#234d2c] text-white font-semibold px-6 py-3 rounded-xl flex items-center gap-2 shadow-lg transition">
                <i class='bx bx-plus-circle text-xl'></i>
                Tambah Kategori Baru
            </button>
        </div>

        <!-- Statistik Kategori (ringkasan) -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-[#fefcf7] rounded-2xl shadow-lg border border-[#dfcfbb] p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-[#886b4b] font-medium">Total Kategori</p>
                        <p class="text-3xl font-bold text-[#4d3e2f] mt-2">8</p>
                    </div>
                    <div class="bg-[#f5ede1] p-4 rounded-full">
                        <i class='bx bx-category text-3xl text-[#5f7b5a]'></i>
                    </div>
                </div>
            </div>
            <div class="bg-[#fefcf7] rounded-2xl shadow-lg border border-[#dfcfbb] p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-[#886b4b] font-medium">Makanan</p>
                        <p class="text-3xl font-bold text-[#4d3e2f] mt-2">4</p>
                    </div>
                    <div class="bg-[#f5ede1] p-4 rounded-full">
                        <i class='bx bx-bowl-hot text-3xl text-[#5f7b5a]'></i>
                    </div>
                </div>
            </div>
            <div class="bg-[#fefcf7] rounded-2xl shadow-lg border border-[#dfcfbb] p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-[#886b4b] font-medium">Minuman</p>
                        <p class="text-3xl font-bold text-[#4d3e2f] mt-2">3</p>
                    </div>
                    <div class="bg-[#f5ede1] p-4 rounded-full">
                        <i class='bx bx-drink text-3xl text-[#5f7b5a]'></i>
                    </div>
                </div>
            </div>
            <div class="bg-[#fefcf7] rounded-2xl shadow-lg border border-[#dfcfbb] p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-[#886b4b] font-medium">Paket Keluarga</p>
                        <p class="text-3xl font-bold text-[#4d3e2f] mt-2">1</p>
                    </div>
                    <div class="bg-[#f5ede1] p-4 rounded-full">
                        <i class='bx bx-group text-3xl text-[#5f7b5a]'></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar Kategori (Read) -->
        <div class="bg-[#fefcf7] rounded-3xl shadow-xl border border-[#dfcfbb] overflow-hidden">
            <div class="p-6 border-b border-[#dfcfbb] bg-[#f5ede1] flex justify-between items-center">
                <h3 class="text-xl font-bold text-[#4d3e2f] flex items-center gap-2">
                    <i class='bx bx-list-ul text-[#5f7b5a]'></i>
                    Daftar Kategori Menu
                </h3>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-stone-600">Total: 8 kategori</span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-[#faf3ea]">
                        <tr class="text-left text-sm font-semibold text-[#634832]">
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Nama Kategori</th>
                            <th class="px-6 py-4">Icon</th>
                            <th class="px-6 py-4">Deskripsi</th>
                            <th class="px-6 py-4">Jumlah Menu</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Dibuat</th>
                            <th class="px-6 py-4 text-center">Aksi (CRUD)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#dfcfbb]">
                        @foreach ($data as $k)
                            <tr class="hover:bg-[#faf3ea] transition">
                                <td class="px-6 py-4 font-mono text-sm">#{{ $k->id }}</td>
                                <td class="px-6 py-4 font-medium text-[#5f4530]">{{ $k->nama_kategori }}</td>
                                <td class="px-6 py-4"><i class='bx {{ $k->icon }} text-2xl text-[#5f7b5a]'></i></td>
                                <td class="px-6 py-4">{{ $k->deskripsi }}</td>
                                <td class="px-6 py-4">
                                    <span class="bg-[#f5ede1] px-3 py-1 rounded-full text-sm">12 menu</span>
                                </td>
                                <td class="px-6 py-4"><span
                                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-sm">12 Jan 2025</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-3">
                                        <!-- Detail (Read) -->
                                        <button onclick="showDetail('Makanan')"
                                            class="text-blue-600 hover:text-blue-800 transition" title="Detail">
                                            <i class='bx bx-show text-xl'></i>
                                        </button>
                                        <!-- Edit (Update) -->
                                        <button
                                            onclick="openEditModal('K001', 'Makanan', 'bx-bowl-hot', 'Hidangan utama, lauk-pauk, dan makanan berat', 'Aktif')"
                                            class="text-[#b48b5a] hover:text-[#9e764b] transition" title="Edit">
                                            <i class='bx bx-edit-alt text-xl'></i>
                                        </button>
                                        <!-- Delete -->
                                        <button onclick="confirmDelete('#K001', 'Makanan')"
                                            class="text-red-600 hover:text-red-800 transition" title="Hapus">
                                            <i class='bx bx-trash text-xl'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Footer Tabel (Pagination) -->
            <div
                class="p-6 border-t border-[#dfcfbb] bg-[#faf3ea] flex flex-col sm:flex-row justify-between items-center gap-4">
                <span class="text-sm text-stone-600">Menampilkan 1 - 6 dari 8 kategori</span>
                <div class="flex gap-2">
                    <button
                        class="px-4 py-2 border border-[#bc9f83] rounded-lg bg-white text-[#634832] hover:bg-[#f5ede1] transition disabled:opacity-50"
                        disabled>
                        <i class='bx bx-chevron-left'></i> Prev
                    </button>
                    <button class="px-4 py-2 bg-[#2f5e3a] text-white rounded-lg hover:bg-[#234d2c] transition">1</button>
                    <button
                        class="px-4 py-2 border border-[#bc9f83] rounded-lg bg-white text-[#634832] hover:bg-[#f5ede1] transition">2</button>
                    <button
                        class="px-4 py-2 border border-[#bc9f83] rounded-lg bg-white text-[#634832] hover:bg-[#f5ede1] transition">Next
                        <i class='bx bx-chevron-right'></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection
