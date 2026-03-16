@extends('layouts.app')
@section('title', 'Manajemen Users | Warung Daun')
@section('content')
    <div>
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
            <!-- Tombol Tambah User (trigger Flowbite modal) -->
            <button data-modal-target="addUserModal" data-modal-toggle="addUserModal"
                class="bg-[#7aa57a] text-white rounded-full px-6 py-2.5 text-sm shadow-md flex items-center gap-2 hover:bg-[#689268] transition-colors mt-4 sm:mt-0">
                <i class='bx bx-plus-circle'></i> Tambah User Baru
            </button>
        </div>

        <!-- FILTER -->
        <div class="flex flex-wrap gap-3 mb-6 items-center justify-between">
            <div class="flex gap-2">
                <span class="bg-white border border-[#ddd0c4] rounded-full px-5 py-2 text-sm flex items-center gap-2">
                    <i class='bx bx-filter-alt text-[#7aa57a]'></i> Semua Role
                </span>
                <span class="bg-white border border-[#ddd0c4] rounded-full px-5 py-2 text-sm flex items-center gap-2">
                    <i class='bx bx-chevron-down text-xs'></i> Status
                </span>
            </div>
            <div class="relative">
                <i class='bx bx-search absolute left-4 top-3 text-[#8b7a6b] text-sm'></i>
                <input type="text" placeholder="Cari user..."
                    class="pl-10 pr-5 py-2 rounded-full border border-[#ddd0c4] bg-white text-sm w-64 focus:outline-none focus:ring-2 focus:ring-[#7aa57a]/30">
            </div>
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
                            <th class="text-left py-4 px-6 font-medium">Terdaftar</th>
                            <th class="text-left py-4 px-6 font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#f0e7df]">
                        <!-- row 1 -->
                        <tr class="hover:bg-[#fcf9f7] transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 bg-[#e0d6cc] rounded-full flex items-center justify-center text-[#5f4d40]">
                                        <i class='bx bxs-user-circle'></i>
                                    </div>
                                    <span class="font-medium text-[#3d332b]">Dewi Lestari</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">dewi@warungdaun.id</td>
                            <td class="py-4 px-6"><span
                                    class="bg-[#e9f0e9] text-[#2d5a2d] px-3 py-1 rounded-full text-xs font-medium">Admin</span>
                            </td>
                            <td class="py-4 px-6"><span
                                    class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Aktif</span>
                            </td>
                            <td class="py-4 px-6">1 Mar 2024</td>
                            <td class="py-4 px-6">
                                <div class="flex gap-2">
                                    <button data-modal-target="editUserModal" data-modal-toggle="editUserModal"
                                        onclick="populateEditModal(1)"
                                        class="text-[#7aa57a] hover:text-[#5a805a] transition p-1">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                    <button onclick="confirmDelete(1)"
                                        class="text-[#b48b5a] hover:text-[#8e6943] transition p-1">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- row 2 -->
                        <tr class="hover:bg-[#fcf9f7] transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 bg-[#e0d6cc] rounded-full flex items-center justify-center text-[#5f4d40]">
                                        <i class='bx bxs-user-circle'></i>
                                    </div>
                                    <span class="font-medium text-[#3d332b]">Rama Putra</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">rama@warungdaun.id</td>
                            <td class="py-4 px-6"><span
                                    class="bg-[#f7ede2] text-[#8e6943] px-3 py-1 rounded-full text-xs font-medium">Kasir</span>
                            </td>
                            <td class="py-4 px-6"><span
                                    class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Aktif</span>
                            </td>
                            <td class="py-4 px-6">15 Feb 2024</td>
                            <td class="py-4 px-6">
                                <div class="flex gap-2">
                                    <button data-modal-target="editUserModal" data-modal-toggle="editUserModal"
                                        onclick="populateEditModal(2)"
                                        class="text-[#7aa57a] hover:text-[#5a805a] transition p-1">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                    <button onclick="confirmDelete(2)"
                                        class="text-[#b48b5a] hover:text-[#8e6943] transition p-1">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- row 3 -->
                        <tr class="hover:bg-[#fcf9f7] transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 bg-[#e0d6cc] rounded-full flex items-center justify-center text-[#5f4d40]">
                                        <i class='bx bxs-user-circle'></i>
                                    </div>
                                    <span class="font-medium text-[#3d332b]">Siti Nurhaliza</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">siti@warungdaun.id</td>
                            <td class="py-4 px-6"><span
                                    class="bg-[#e6d9cb] text-[#6b5b4c] px-3 py-1 rounded-full text-xs font-medium">Manager</span>
                            </td>
                            <td class="py-4 px-6"><span
                                    class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Aktif</span>
                            </td>
                            <td class="py-4 px-6">10 Jan 2024</td>
                            <td class="py-4 px-6">
                                <div class="flex gap-2">
                                    <button data-modal-target="editUserModal" data-modal-toggle="editUserModal"
                                        onclick="populateEditModal(3)"
                                        class="text-[#7aa57a] hover:text-[#5a805a] transition p-1">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                    <button onclick="confirmDelete(3)"
                                        class="text-[#b48b5a] hover:text-[#8e6943] transition p-1">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- row 4 (nonaktif) -->
                        <tr class="hover:bg-[#fcf9f7] transition-colors opacity-80">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 bg-[#e0d6cc] rounded-full flex items-center justify-center text-[#5f4d40]">
                                        <i class='bx bxs-user-circle'></i>
                                    </div>
                                    <span class="font-medium text-[#3d332b]">Budi Santoso</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">budi@warungdaun.id</td>
                            <td class="py-4 px-6"><span
                                    class="bg-[#f7ede2] text-[#8e6943] px-3 py-1 rounded-full text-xs font-medium">Kasir</span>
                            </td>
                            <td class="py-4 px-6"><span
                                    class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs">Nonaktif</span>
                            </td>
                            <td class="py-4 px-6">20 Mar 2024</td>
                            <td class="py-4 px-6">
                                <div class="flex gap-2">
                                    <button data-modal-target="editUserModal" data-modal-toggle="editUserModal"
                                        onclick="populateEditModal(4)"
                                        class="text-[#7aa57a] hover:text-[#5a805a] transition p-1">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                    <button onclick="confirmDelete(4)"
                                        class="text-[#b48b5a] hover:text-[#8e6943] transition p-1">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- pagination -->
            <div
                class="flex justify-between items-center px-6 py-4 bg-[#f8f5f2] border-t border-[#e5d9d0] text-sm text-[#8b7a6b]">
                <span>Menampilkan 1-4 dari 12 user</span>
                <div class="flex gap-2">
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">
                        <i class='bx bx-chevron-left text-xs'></i>
                    </span>
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#7aa57a] text-white">1</span>
                    <span
                        class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">2</span>
                    <span
                        class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">3</span>
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4]">
                        <i class='bx bx-chevron-right text-xs'></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah User -->

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
                    <form onsubmit="event.preventDefault(); saveUser('add');" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Nama Lengkap <span
                                    class="text-red-400">*</span></label>
                            <input type="text"
                                class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30 focus:border-[#7aa57a] outline-none"
                                placeholder="contoh: Dewi Lestari">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Email</label>
                            <input type="email"
                                class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                placeholder="user@warungdaun.id">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Password <span
                                    class="text-red-400">*</span></label>
                            <input type="password"
                                class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                placeholder="min. 6 karakter">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Role</label>
                                <select
                                    class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">
                                    <option>Admin</option>
                                    <option selected>Kasir</option>
                                    <option>Manager</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-[#5f4d40] mb-1">Status</label>
                                <select
                                    class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">
                                    <option selected>Aktif</option>
                                    <option>Nonaktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 mt-6">
                            <button type="button" data-modal-hide="addUserModal"
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

    <!-- FLOWBITE MODAL: EDIT USER -->
    <div id="editUserModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl shadow-lg border border-[#e5d9d0]">
                <div class="flex items-center justify-between p-4 md:p-5 border-b border-[#e5d9d0] rounded-t-2xl">
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
                    <form onsubmit="event.preventDefault(); updateUser();" class="space-y-4">
                        <input type="hidden" id="editUserId">
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Nama Lengkap</label>
                            <input type="text" id="editName"
                                class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                value="Dewi Lestari">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Email</label>
                            <input type="email" id="editEmail"
                                class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30"
                                value="dewi@warungdaun.id">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Role</label>
                            <select id="editRole"
                                class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">
                                <option>Admin</option>
                                <option>Kasir</option>
                                <option>Manager</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#5f4d40] mb-1">Status</label>
                            <select id="editStatus"
                                class="w-full px-4 py-2.5 rounded-xl border border-[#ddd0c4] bg-white focus:ring-2 focus:ring-[#7aa57a]/30">
                                <option>Aktif</option>
                                <option>Nonaktif</option>
                            </select>
                        </div>
                        <div class="flex justify-end gap-3 mt-6">
                            <button type="button" data-modal-hide="editUserModal"
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
@endsection
