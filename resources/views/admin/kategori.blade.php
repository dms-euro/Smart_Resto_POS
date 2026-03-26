@extends('layouts.app')
@section('tiltle', 'Kategori | Warung Daun')
@section('content')
    <div>
        <!-- header -->
        <div class="flex flex-wrap items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-[#3d332b] flex items-center gap-3">
                    <i class='bx bxs-category-alt text-[#7aa57a]'></i> Manajemen Kategori
                    <span class="text-sm bg-[#e0d6cc] text-[#4a3f37] px-3 py-1 rounded-full font-normal">4
                        kategori</span>
                </h1>
                <p class="text-[#8b7a6b] mt-1 flex items-center gap-2">
                    <i class='bx bx-category text-[#7aa57a]'></i> Kelola kategori menu makanan & minuman
                </p>
            </div>
            <!-- Tombol Tambah Kategori -->
            <button data-modal-target="addCategoryModal" data-modal-toggle="addCategoryModal"
                class="bg-[#7aa57a] text-white rounded-full px-6 py-2.5 text-sm shadow-md flex items-center gap-2 hover:bg-[#689268] transition-colors mt-4 sm:mt-0">
                <i class='bx bx-plus-circle'></i> Tambah Kategori Baru
            </button>
        </div>

        <!-- STATISTIK KATEGORI (ringkasan) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            <div class="bg-white rounded-2xl border border-[#e5d9d0] shadow-sm p-5 flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Total Kategori</p>
                    <p class="text-3xl font-bold text-[#3d332b]">4</p>
                    <span class="text-xs text-green-800 bg-green-100 px-2 py-0.5 rounded-full mt-2 inline-block">Aktif
                        semua</span>
                </div>
                <div class="w-14 h-14 bg-[#f0ebe6] rounded-full flex items-center justify-center text-3xl text-[#b48b5a]">
                    <i class='bx bx-category'></i>
                </div>
            </div>
            <div class="bg-white rounded-2xl border border-[#e5d9d0] shadow-sm p-5 flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Makanan</p>
                    <p class="text-3xl font-bold text-[#3d332b]">48</p>
                    <span class="text-xs text-[#7aa57a] bg-green-50 px-2 py-0.5 rounded-full mt-2 inline-block">menu</span>
                </div>
                <div class="w-14 h-14 bg-[#e9f0e9] rounded-full flex items-center justify-center text-3xl text-[#6f9e6f]">
                    <i class='bx bxs-bowl-hot'></i>
                </div>
            </div>
            <div class="bg-white rounded-2xl border border-[#e5d9d0] shadow-sm p-5 flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Minuman</p>
                    <p class="text-3xl font-bold text-[#3d332b]">44</p>
                    <span class="text-xs text-[#b48b5a] bg-amber-50 px-2 py-0.5 rounded-full mt-2 inline-block">menu</span>
                </div>
                <div class="w-14 h-14 bg-[#f7ede2] rounded-full flex items-center justify-center text-3xl text-[#b48b5a]">
                    <i class='bx bxs-coffee'></i>
                </div>
            </div>
            <div class="bg-white rounded-2xl border border-[#e5d9d0] shadow-sm p-5 flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Snack</p>
                    <p class="text-3xl font-bold text-[#3d332b]">34</p>
                    <span class="text-xs text-[#8e6943] bg-amber-50 px-2 py-0.5 rounded-full mt-2 inline-block">menu</span>
                </div>
                <div class="w-14 h-14 bg-[#f7ede2] rounded-full flex items-center justify-center text-3xl text-[#b48b5a]">
                    <i class='bx bxs-cake'></i>
                </div>
            </div>
        </div>

        <!-- TABEL KATEGORI -->
        <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-[#f8f5f2] text-[#6b5b4c] border-b border-[#e0d3c7]">
                        <tr>
                            <th class="text-left py-4 px-6 font-medium">Icon</th>
                            <th class="text-left py-4 px-6 font-medium">Nama Kategori</th>
                            <th class="text-left py-4 px-6 font-medium">Deskripsi</th>
                            <th class="text-left py-4 px-6 font-medium">Jumlah Menu</th>
                            <th class="text-left py-4 px-6 font-medium">Status</th>
                            <th class="text-left py-4 px-6 font-medium">Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($kategori as $kategori)
                        <tbody class="divide-y divide-[#f0e7df]">
                            <!-- row 1: Makanan -->
                            <tr class="hover:bg-[#fcf9f7] transition-colors">
                                <td class="py-4 px-6">
                                    <div
                                        class="w-10 h-10 bg-[#e9f0e9] rounded-lg flex items-center justify-center text-[#6f9e6f] text-xl">
                                        <i class='bx bxs-bowl-hot'></i>
                                    </div>
                                </td>
                                <td class="py-4 px-6 font-medium text-[#3d332b]">{{ $kategori->nama_kategori }}</td>
                                <td class="py-4 px-6">{{ $kategori->deskripsi }}</td>
                                <td class="py-4 px-6">48 menu</td>
                                <td class="py-4 px-6"><span
                                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Aktif</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex gap-2">
                                        <button data-modal-target="editCategoryModal" data-modal-toggle="editCategoryModal"
                                            onclick="populateEditCategory(1)"
                                            class="text-[#7aa57a] hover:text-[#5a805a] transition p-1">
                                            <i class='bx bxs-edit'></i>
                                        </button>

                                        <form id="delete-form-{{ $kategori->id }}"
                                            action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                            onclick="confirmDelete({ id: {{ $kategori->id }} })"
                                            class="text-[#b48b5a] hover:text-[#8e6943] transition p-1">
                                            <i class='bx bxs-trash'></i>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <!-- FLOWBITE MODAL: EDIT KATEGORI -->
                        <div id="editCategoryModal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-2xl shadow-lg border border-[#e5d9d0]">
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b border-[#e5d9d0] rounded-t-2xl">
                                        <h3 class="text-xl font-semibold text-[#3d332b] flex items-center gap-2">
                                            <i class='bx bxs-edit text-[#7aa57a]'></i> Edit Kategori
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                            data-modal-hide="editCategoryModal">
                                            <i class='bx bx-x text-xl'></i>
                                        </button>
                                    </div>
                                    <div class="p-4 md:p-5">
                                        <form action="{{ route('kategori.update', ['id' => $kategori->id]) }}"
                                            method="POST" class="space-y-4">
                                            @csrf
                                            @method('PUT')
                                            <div>
                                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Nama Kategori
                                                    <span class="text-red-400">*</span></label>
                                                <input type="text" name="nama_kategori" id="nama_kategori"
                                                    class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                    value="{{ $kategori->nama_kategori }}" required>
                                            </div>
                                            <div>
                                                <label
                                                    class="block text-sm font-medium text-[#5f4d40] mb-1">Deskripsi</label>
                                                <textarea rows="3" name="deskripsi" id="deskripsi"
                                                    class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                    required>{{ $kategori->deskripsi }}</textarea>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Kategori
                                                    Icon</label>
                                                <div class="relative">
                                                    <select name="icon" id="icon"
                                                        class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30 focus:border-[#7aa57a] outline-none appearance-none transition-all cursor-pointer text-[#5f4d40]"
                                                        required>
                                                        <option value="" disabled>Pilih Icon</option>
                                                        <option value="makanan"
                                                            {{ $kategori->icon == 'makanan' ? 'selected' : '' }}>🍲
                                                            Makanan
                                                        </option>
                                                        <option value="minuman"
                                                            {{ $kategori->icon == 'minuman' ? 'selected' : '' }}>☕
                                                            Minuman
                                                        </option>
                                                        <option value="camilan"
                                                            {{ $kategori->icon == 'camilan' ? 'selected' : '' }}>🍰
                                                            Camilan
                                                        </option>
                                                    </select>
                                                    <div
                                                        class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-[#5f4d40]">
                                                        <i class='bx bx-chevron-down text-xl'></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-end gap-3 mt-6">
                                                <button type="reset" data-modal-hide="editCategoryModal"
                                                    class="px-5 py-2 rounded-full border border-[#ddd0c4] text-[#5f4d40] hover:bg-gray-50 transition">Batal</button>
                                                <button type="submit"
                                                    class="px-5 py-2 rounded-full bg-[#7aa57a] text-white hover:bg-[#689268] transition flex items-center gap-2">
                                                    <i class='bx bx-check-circle'></i> Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </table>
            </div>
            <!-- pagination -->
            <div
                class="flex justify-between items-center px-6 py-4 bg-[#f8f5f2] border-t border-[#e5d9d0] text-sm text-[#8b7a6b]">
                <span>Menampilkan 1-4 dari 4 kategori</span>
                <div class="flex gap-2">
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">
                        <i class='bx bx-chevron-left text-xs'></i>
                    </span>
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#7aa57a] text-white">1</span>
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">
                        <i class='bx bx-chevron-right text-xs'></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD KATEGORI -->
    <div id="addCategoryModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl shadow-lg border border-[#e5d9d0]">
                <div class="flex items-center justify-between p-4 md:p-5 border-b border-[#e5d9d0] rounded-t-2xl">
                    <h3 class="text-xl font-semibold text-[#3d332b] flex items-center gap-2">
                        <i class='bx bx-category-plus text-[#7aa57a]'></i> Tambah Kategori
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="addCategoryModal">
                        <i class='bx bx-x text-xl'></i>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Nama Kategori <span
                                    class="text-red-400">*</span></label>
                            <input type="text" name="nama_kategori" id="nama_kategori"
                                class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                placeholder="contoh: Makanan" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Deskripsi</label>
                            <textarea rows="3" name="deskripsi" id="deskripsi"
                                class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                placeholder="Deskripsi kategori..." required></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Kategori Icon</label>
                            <div class="relative">
                                <select name="icon" id="icon"
                                    class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30 focus:border-[#7aa57a] outline-none appearance-none transition-all cursor-pointer text-[#5f4d40]"
                                    required>
                                    <option value="makanan">🍲 Makanan</option>
                                    <option value="minuman">☕ Minuman</option>
                                    <option value="camilan">🍰 Camilan</option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-[#5f4d40]">
                                    <i class='bx bx-chevron-down text-xl'></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 mt-6">
                            <button type="reset" data-modal-hide="addCategoryModal"
                                class="px-5 py-2 rounded-full border border-[#ddd0c4] text-[#5f4d40] hover:bg-gray-50 transition">Batal</button>
                            <button type="submit"
                                class="px-5 py-2 rounded-full bg-[#7aa57a] text-white hover:bg-[#689268] transition flex items-center gap-2">
                                <i class='bx bx-check-circle'></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
