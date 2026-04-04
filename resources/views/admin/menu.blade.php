@extends('layouts.app')
@section('title', 'Menu | Warung Daun')
@section('content')
    <div>
        <div class="flex-1 overflow-y-auto p-6 md:p-8 bg-[#f8f5f2]">
            <!-- header -->
            <div class="flex flex-wrap items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-[#3d332b] flex items-center gap-3">
                        <i class='bx bxs-food-menu text-[#7aa57a]'></i> Manajemen Menu
                        <span
                            class="text-sm bg-[#e0d6cc] text-[#4a3f37] px-3 py-1 rounded-full font-normal">{{ $menu->count() }}
                            menu</span>
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

                    <span data-filter="all"
                        class="filter-btn cursor-pointer px-5 py-2 border rounded-full bg-[#7aa57a] text-white">
                        Semua
                    </span>

                    <span data-filter="tersedia" class="filter-btn cursor-pointer px-5 py-2 border rounded-full">
                        Tersedia
                    </span>

                    <span data-filter="habis" class="filter-btn cursor-pointer px-5 py-2 border rounded-full">
                        Habis
                    </span>

                </div>
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Cari menu..."
                        class="pl-4 pr-4 py-2 border rounded-full w-64">
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
                        <p class="text-xl font-bold text-[#3d332b]">{{ $menu->count() }}</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-[#e5d9d0] p-4 flex items-center gap-3">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <i class='bx bx-check-circle text-2xl'></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Tersedia</p>
                        <p class="text-xl font-bold text-[#3d332b]">{{ $menu->where('status', 'tersedia')->count() }}</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-[#e5d9d0] p-4 flex items-center gap-3">
                    <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center text-amber-600">
                        <i class='bx bx-x-circle text-2xl'></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Habis</p>
                        <p class="text-xl font-bold text-[#3d332b]">{{ $menu->where('status', 'habis')->count() }}</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-[#e5d9d0] p-4 flex items-center gap-3">
                    <div class="w-12 h-12 bg-[#f7ede2] rounded-full flex items-center justify-center text-[#b48b5a]">
                        <i class='bx bx-category text-2xl'></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Kategori</p>
                        <p class="text-xl font-bold text-[#3d332b]">{{ $kategori->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- TABEL MENU -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($menu as $item)
                    <div data-nama="{{ strtolower($item->nama_menu) }}" data-status="{{ $item->status }}"
                        data-kategori="{{ strtolower($item->kategori->nama_kategori) }}"
                        class="menu-item bg-white rounded-2xl shadow-sm border border-[#e5d9d0] overflow-hidden hover:shadow-md transition">
                        <div class="h-40 bg-[#e0d6cc] relative overflow-hidden">

                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover" />
                            @else
                                <div class="flex items-center justify-center h-full text-[#8b7a6b]">
                                    <i class='bx bx-image-alt text-6xl opacity-30'></i>
                                </div>
                            @endif

                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-semibold text-[#3d332b] text-lg">{{ $item->nama_menu }}</h3>
                                @if ($item->status == 'tersedia')
                                    <span
                                        class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">{{ $item->status }}</span>
                                @endif
                                @if ($item->status == 'habis')
                                    <span
                                        class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">{{ $item->status }}</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600 mb-2">{{ $item->deskripsi }}</p>
                            <div class="flex justify-between items-center mb-3">
                                <span
                                    class="text-sm bg-[#f8f5f2] px-3 py-1 rounded-full">{{ $item->kategori->nama_kategori }}</span>
                                <span class="font-bold text-[#3d332b]">Rp
                                    {{ number_format($item->harga, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex items-center justify-between border-t border-[#f0e7df] pt-3">
                                <span class="text-sm bg-[#f8f5f2] px-3 py-1 rounded-full">
                                    {{ $item->stok }} stok
                                </span>
                                <div class="flex items-center gap-2">
                                    <button data-modal-target="editMenuModal" data-modal-toggle="editMenuModal"
                                        onclick="populateEditMenu({{ $item->id }})"
                                        class="text-[#7aa57a] hover:text-[#5a805a] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                    <div>
                                        <div id="addMenuModal" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                <div
                                                    class="relative bg-white rounded-2xl shadow-lg border border-[#e5d9d0]">
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b border-[#e5d9d0] rounded-t-2xl">
                                                        <h3
                                                            class="text-xl font-semibold text-[#3d332b] flex items-center gap-2">
                                                            <i class='bx bx-dish text-[#7aa57a]'></i> Tambah Menu Baru
                                                        </h3>
                                                        <button type="reset"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                            data-modal-hide="addMenuModal">
                                                            <i class='bx bx-x text-xl'></i>
                                                        </button>
                                                    </div>
                                                    <div class="p-4 md:p-5">
                                                        <form action="{{ route('menu.store') }}" method="POST"
                                                            enctype="multipart/form-data" class="space-y-4">
                                                            @csrf
                                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                                <div>
                                                                    <label
                                                                        class="block text-sm font-medium text-[#5f4d40] mb-1">Nama
                                                                        Menu <span class="text-red-400">*</span></label>
                                                                    <input type="text" name="nama_menu"
                                                                        class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                                        placeholder="contoh: Nasi Goreng">
                                                                </div>
                                                                <div>
                                                                    <label
                                                                        class="block text-sm font-medium text-[#5f4d40] mb-1">Kategori</label>
                                                                    <select
                                                                        class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                                        name="kategori_id">
                                                                        <option value="">Pilih Kategori</option>
                                                                        @foreach ($kategori as $k)
                                                                            <option value="{{ $k->id }}">
                                                                                {{ $k->nama_kategori }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-[#5f4d40] mb-1">Deskripsi</label>
                                                                <textarea rows="2" name="deskripsi"
                                                                    class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                                    placeholder="Deskripsi menu..."></textarea>
                                                            </div>

                                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                                <div>
                                                                    <label
                                                                        class="block text-sm font-medium text-[#5f4d40] mb-1">Harga
                                                                        <span class="text-red-400">*</span></label>
                                                                    <div class="relative">
                                                                        <span
                                                                            class="absolute left-3 top-3 text-gray-500">Rp</span>
                                                                        <input type="number" name="harga"
                                                                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                                            placeholder="35000" step="0.01">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label
                                                                        class="block text-sm font-medium text-[#5f4d40] mb-1">Stock
                                                                        <span class="text-red-400">*</span></label>
                                                                    <div class="relative">
                                                                        <span
                                                                            class="absolute left-3 top-3 text-gray-500">Qty</span>
                                                                        <input type="number" name="stok"
                                                                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                                            placeholder="100" step="1">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-[#5f4d40] mb-1">Upload
                                                                    Foto Menu</label>

                                                                <div class="flex items-center justify-center w-full">
                                                                    <label
                                                                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-[#ddd0c4] rounded-xl bg-[#f8f5f2] cursor-pointer hover:bg-gray-100 overflow-hidden">

                                                                        <img id="previewImage"
                                                                            class="hidden w-full h-full object-cover rounded-xl" />

                                                                        <div id="uploadText"
                                                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                            <i
                                                                                class='bx bx-cloud-upload text-3xl text-[#7aa57a]'></i>
                                                                            <p class="mb-2 text-sm text-gray-500">
                                                                                <span class="font-semibold">Klik untuk
                                                                                    upload</span> atau drag & drop
                                                                            </p>
                                                                            <p class="text-xs text-gray-400">PNG, JPG, WEBP
                                                                                (max. 2MB)</p>
                                                                        </div>

                                                                        <input type="file" id="fotoInput"
                                                                            name="foto" class="hidden"
                                                                            accept="image/*" />
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="flex justify-end gap-3 mt-6">
                                                                <button type="button" data-modal-hide="addMenuModal"
                                                                    class="px-5 py-2 rounded-full border border-[#ddd0c4] text-[#5f4d40] hover:bg-gray-50 transition">Batal</button>
                                                                <button type="submit"
                                                                    class="px-5 py-2 rounded-full bg-[#7aa57a] text-white hover:bg-[#689268] transition flex items-center gap-2">
                                                                    <i class='bx bx-check-circle'></i> Simpan Menu
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- FLOWBITE MODAL: EDIT MENU -->
                                        <div id="editMenuModal" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                <div
                                                    class="relative bg-white rounded-2xl shadow-lg border border-[#e5d9d0]">
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b border-[#e5d9d0] rounded-t-2xl">
                                                        <h3
                                                            class="text-xl font-semibold text-[#3d332b] flex items-center gap-2">
                                                            <i class='bx bxs-edit text-[#7aa57a]'></i> Edit Menu
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                            data-modal-hide="editMenuModal">
                                                            <i class='bx bx-x text-xl'></i>
                                                        </button>
                                                    </div>
                                                    <div class="p-4 md:p-5">
                                                        <form action="{{ route('menu.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" id="editMenuId">
                                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                                <div>
                                                                    <label
                                                                        class="block text-sm font-medium text-[#5f4d40] mb-1">Nama
                                                                        Menu</label>
                                                                    <input type="text" id="editMenuName"
                                                                        name="nama_menu"
                                                                        class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                                        value="{{ $item->nama_menu }}">
                                                                </div>
                                                                <div>
                                                                    <label
                                                                        class="block text-sm font-medium text-[#5f4d40] mb-1">Kategori</label>
                                                                    <select name="kategori_id"
                                                                        class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white">
                                                                        @foreach ($kategori as $k)
                                                                            <option value="{{ $k->id }}"
                                                                                {{ $item->kategori_id == $k->id ? 'selected' : '' }}>
                                                                                {{ $k->nama_kategori }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-[#5f4d40] mb-1">Deskripsi</label>
                                                                <textarea id="editMenuDesc" name="deskripsi" rows="2" value="{{ $item->deskripsi }}"
                                                                    class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">{{ $item->deskripsi }}</textarea>
                                                            </div>

                                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                                <div>
                                                                    <label
                                                                        class="block text-sm font-medium text-[#5f4d40] mb-1">Harga
                                                                        <span class="text-red-400">*</span></label>
                                                                    <div class="relative">
                                                                        <span
                                                                            class="absolute left-3 top-3 text-gray-500">Rp</span>
                                                                        <input type="number" name="harga"
                                                                            value="{{ $item->harga }}"
                                                                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                                            placeholder="35000" step="0.01">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label
                                                                        class="block text-sm font-medium text-[#5f4d40] mb-1">Stock
                                                                        <span class="text-red-400">*</span></label>
                                                                    <div class="relative">
                                                                        <span
                                                                            class="absolute left-3 top-3 text-gray-500">Qty</span>
                                                                        <input type="number" name="stok"
                                                                            value="{{ $item->stok }}"
                                                                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                                            placeholder="100" step="1">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-[#5f4d40] mb-1">Upload
                                                                    Foto Menu</label>

                                                                <div class="flex items-center justify-center w-full">
                                                                    <label
                                                                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-[#ddd0c4] rounded-xl bg-[#f8f5f2] cursor-pointer hover:bg-gray-100 overflow-hidden">

                                                                        <img id="previewImageEdit"
                                                                            class="w-full h-full object-cover rounded-xl hidden" />
                                                                        <div id="uploadText"
                                                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                            <i
                                                                                class='bx bx-cloud-upload text-3xl text-[#7aa57a]'></i>
                                                                            <p class="mb-2 text-sm text-gray-500">
                                                                                <span class="font-semibold">Klik untuk
                                                                                    upload</span> atau drag & drop
                                                                            </p>
                                                                            <p class="text-xs text-gray-400">PNG, JPG, WEBP
                                                                                (max. 2MB)</p>
                                                                        </div>
                                                                        <input type="file" id="fotoEdit"
                                                                            name="foto" class="hidden"
                                                                            accept="image/*" />
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="flex justify-end gap-3 mt-6">
                                                                <button type="reset" data-modal-hide="editMenuModal"
                                                                    class="px-5 py-2 rounded-full border border-[#ddd0c4] text-[#5f4d40] hover:bg-gray-50 transition">Batal</button>
                                                                <button type="submit"
                                                                    class="px-5 py-2 rounded-full bg-[#7aa57a] text-white hover:bg-[#689268] transition flex items-center gap-2">
                                                                    <i class='bx bx-check-circle'></i> Perbarui Menu
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('menu.destroy', $item->id) }}" method="POST"
                                        onclick="confirmDelete({ id: {{ $item->id }} })"
                                        class="text-[#b48b5a] hover:text-[#8e6943] transition p-2 bg-[#f8f5f2] rounded-full w-8 h-8 flex items-center justify-center">
                                        <i class='bx bxs-trash'></i>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div
                class="mt-4 flex justify-between items-center px-6 py-4 bg-[#f8f5f2] border-t border-[#e5d9d0] text-sm text-[#8b7a6b]">
                <div>
                    Menampilkan {{ $menu->firstItem() }} - {{ $menu->lastItem() }} dari
                    {{ $menu->total() }} kategori
                </div>
                @if ($menu->hasPages())
                    <div>
                        {{ $menu->links('pagination::tailwind') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const input = document.getElementById('fotoInput');
            const preview = document.getElementById('previewImage');
            const text = document.getElementById('uploadText');

            input.addEventListener('change', function() {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                        text.classList.add('hidden');
                    }

                    reader.readAsDataURL(file);
                }
            });
        </script>
        <script>
            const inputEdit = document.getElementById('fotoEdit');
            const previewEdit = document.getElementById('previewImageEdit');
            const textEdit = document.getElementById('uploadTextEdit');

            inputEdit.addEventListener('change', function() {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewEdit.src = e.target.result;
                        previewEdit.classList.remove('hidden');
                        textEdit.classList.add('hidden');
                    }

                    reader.readAsDataURL(file);
                }
            });
        </script>
        <script>
            const items = document.querySelectorAll('.menu-item');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const searchInput = document.getElementById('searchInput');

            let currentFilter = 'all';

            // klik filter
            filterButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    currentFilter = btn.dataset.filter;

                    // reset active
                    filterButtons.forEach(b => b.classList.remove('bg-[#7aa57a]', 'text-white'));

                    // set active
                    btn.classList.add('bg-[#7aa57a]', 'text-white');

                    applyFilter();
                });
            });

            // search realtime
            searchInput.addEventListener('input', applyFilter);

            // fungsi filter
            function applyFilter() {
                const search = searchInput.value.toLowerCase();

                items.forEach(item => {
                    const nama = item.dataset.nama;
                    const status = item.dataset.status;

                    const matchSearch = nama.includes(search);
                    const matchFilter = currentFilter === 'all' || status === currentFilter;

                    item.style.display = (matchSearch && matchFilter) ? 'block' : 'none';
                });
            }

            // 🔥 jalan pertama kali
            document.addEventListener('DOMContentLoaded', applyFilter);
        </script>
    @endpush
@endsection
