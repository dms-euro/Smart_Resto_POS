@extends('layouts.app')
@section('title', 'Manajemen Users | Warung Daun')
@section('content')
    <div>
        <div class="flex-1 overflow-y-auto p-6 md:p-8 bg-[#f8f5f2]">
            <!-- header -->
            <div class="flex flex-wrap items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-[#3d332b] flex items-center gap-3">
                        <i class='bx bxs-group text-[#7aa57a]'></i> Manajemen User
                        <span class="text-sm bg-[#e0d6cc] text-[#4a3f37] px-3 py-1 rounded-full font-normal">12
                            aktif</span>
                    </h1>
                    <p class="text-[#8b7a6b] mt-1 flex items-center gap-2">
                        <i class='bx bx-user-plus text-[#7aa57a]'></i> Kelola role admin / kasir / manager
                    </p>
                </div>
            </div>

            <!-- FILTER -->
            <div class="flex flex-wrap mb-6 items-center justify-between">
                <div class="relative">
                    <i class='bx bx-search absolute left-4 top-3 text-[#8b7a6b] text-sm'></i>
                    <input type="text" id="searchInput" placeholder="Cari user..."
                        class="pl-10 pr-5 py-2 rounded-full border border-[#ddd0c4] bg-white text-sm w-64 focus:outline-none focus:ring-2 focus:ring-[#7aa57a]/30">
                </div>
                <!-- Tombol Tambah User (trigger Flowbite modal) -->
                <button data-modal-target="addUserModal" data-modal-toggle="addUserModal"
                    class="bg-[#7aa57a] text-white rounded-full px-6 py-2.5 text-sm shadow-md flex items-center gap-2 hover:bg-[#689268] transition-colors mt-4 sm:mt-0">
                    <i class='bx bx-plus-circle'></i> Tambah User Baru
                </button>
            </div>

            <!-- TABEL USER -->
            <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-[#f8f5f2] text-[#6b5b4c] border-b border-[#e0d3c7]">
                            <tr>
                                <th class="text-left py-4 px-6 font-medium">Nama</th>
                                <th class="text-left py-4 px-6 font-medium">Email</th>
                                <th class="text-left py-4 px-6 font-medium">Role</th>
                                <th class="text-left py-4 px-6 font-medium">Status</th>
                                <th class="text-left py-4 px-6 font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#f0e7df]">
                            @foreach ($user as $item)
                                <tr data-name="{{ strtolower($item->name) }}" data-email="{{ strtolower($item->email) }}"
                                    data-role="{{ strtolower($item->role) }}" class="user-row hover:bg-[#fcf9f7] transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 bg-[#e0d6cc] rounded-full flex items-center justify-center text-[#5f4d40]">
                                                <i class='bx bxs-user-circle'></i>
                                            </div>
                                            <span class="font-medium text-[#3d332b]">{{ $item->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">{{ $item->email }}</td>
                                    <td class="py-4 px-6">
                                        @if ($item->role == 'admin')
                                            <span
                                                class="bg-[#e9f0e9] text-[#2d5a2d] px-3 py-1 rounded-full text-xs font-medium">Admin</span>
                                        @else
                                            <span
                                                class="bg-[#e9f0e9] text-[#8e6943] px-3 py-1 rounded-full text-xs font-medium">Kasir</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        @if ($item->isOnline())
                                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">
                                                Aktif
                                            </span>
                                        @else
                                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs">
                                                Tidak Aktif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex gap-2">
                                            <button data-modal-target="editUserModal-{{ $item->id }}"
                                                data-modal-toggle="editUserModal-{{ $item->id }}"
                                                class="text-[#7aa57a] hover:text-[#5a805a] transition p-1">
                                                <i class='bx bxs-edit'></i>
                                            </button>
                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('users.destroy', $item->id) }}" method="POST"
                                                onclick="confirmDelete({ id: {{ $item->id }} })"
                                                class="text-[#b48b5a] hover:text-[#8e6943] transition p-1">
                                                <i class='bx bxs-trash'></i>
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                <!-- FLOWBITE MODAL: EDIT USER -->
                                <div id="editUserModal-{{ $item->id }}" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-2xl shadow-lg border border-[#e5d9d0]">
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b border-[#e5d9d0] rounded-t-2xl">
                                                <h3 class="text-xl font-semibold text-[#3d332b] flex items-center gap-2">
                                                    <i class='bx bxs-edit text-[#7aa57a]'></i> Edit User
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-hide="editUserModal">
                                                    <i class='bx bx-x text-xl'></i>
                                                </button>
                                            </div>
                                            <div class="p-4 md:p-5">
                                                <form action="{{ route('users.update', $item->id) }}" method="POST"
                                                    class="space-y-4">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" id="editUserId">
                                                    <div>
                                                        <label class="block text-sm font-medium text-[#5f4d40] mb-1">Nama
                                                            Lengkap</label>
                                                        <input type="text" id="editName" name="name"
                                                            class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                            value="{{ $item->name }}">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-[#5f4d40] mb-1">Email</label>
                                                        <input type="email" id="editEmail" name="email"
                                                            class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                                            value="{{ $item->email }}">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-[#5f4d40] mb-1">Role</label>
                                                        <select id="editRole" name="role"
                                                            class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">
                                                            <option value="admin"
                                                                {{ $item->role == 'admin' ? 'selected' : '' }}>Admin
                                                            </option>
                                                            <option value="kasir"
                                                                {{ $item->role == 'kasir' ? 'selected' : '' }}>Kasir
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="flex justify-end gap-3 mt-6">
                                                        <button type="reset"
                                                            data-modal-hide="editUserModal-{{ $item->id }}"
                                                            class="px-5 py-2 rounded-full border border-[#ddd0c4] text-[#5f4d40] hover:bg-gray-50 transition">Batal</button>
                                                        <button type="submit"
                                                            class="px-5 py-2 rounded-full bg-[#7aa57a] text-white hover:bg-[#689268] transition flex items-center gap-2">
                                                            <i class='bx bx-check-circle'></i> Perbarui
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                    <div
                        class="flex justify-between items-center px-6 py-4 bg-[#f8f5f2] border-t border-[#e5d9d0] text-sm text-[#8b7a6b]">
                        <div>
                            Menampilkan {{ $user->firstItem() }} - {{ $user->lastItem() }} dari
                            {{ $user->total() }} User
                        </div>
                        @if ($user->hasPages())
                            <div>
                                {{ $user->links('pagination::tailwind') }}
                            </div>
                        @endif
                    </div>
            </div>
        </div>

        <!-- FLOWBITE MODAL: ADD USER -->
        <div id="addUserModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-2xl shadow-lg border border-[#e5d9d0]">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b border-[#e5d9d0] rounded-t-2xl">
                        <h3 class="text-xl font-semibold text-[#3d332b] flex items-center gap-2">
                            <i class='bx bx-user-plus text-[#7aa57a]'></i> Tambah User Baru
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="addUserModal">
                            <i class='bx bx-x text-xl'></i>
                        </button>
                    </div>
                    <div class="p-4 md:p-5">
                        <form action=""></form>
                        <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Nama Lengkap <span
                                        class="text-red-400">*</span></label>
                                <input type="text" name="name"
                                    class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30 focus:border-[#7aa57a] outline-none"
                                    placeholder="Full name:">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Email</label>
                                <input type="email" name="email"
                                    class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                    placeholder="email@gamial.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Password <span
                                        class="text-red-400">*</span></label>
                                <input type="password" name="password"
                                    class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                    placeholder="min. 6 karakter">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Role</label>
                                <select name="role"
                                    class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">
                                    <option disabled selected>Pilih Role:</option>
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                            </div>
                            <div class="flex justify-end gap-3 mt-6">
                                <button type="reset" data-modal-hide="addUserModal"
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
    </div>

    @push('scripts')
        <script>
            const searchInput = document.getElementById('searchInput');
            const rows = document.querySelectorAll('.user-row');

            searchInput.addEventListener('input', function() {
                const keyword = this.value.toLowerCase();

                rows.forEach(row => {
                    const name = row.dataset.name;
                    const email = row.dataset.email;
                    const role = row.dataset.role;

                    const match =
                        name.includes(keyword) ||
                        email.includes(keyword) ||
                        role.includes(keyword);

                    row.style.display = match ? '' : 'none';
                });
            });
        </script>
    @endpush
@endsection
