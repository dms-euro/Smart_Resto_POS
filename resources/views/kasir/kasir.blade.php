@extends('layouts.app')
@section('title', 'Kasir')
@section('content')
    <div>
        <div class="flex-1 overflow-y-auto p-6 md:p-8 bg-[#f8f5f2]">
            <!-- HEADER TRANSAKSI -->
            <div class="flex flex-wrap items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-[#3d332b] flex items-center gap-3">
                        <i class='bx bx-cart text-[#7aa57a]'></i> Transaksi Penjualan
                    </h1>
                    <p class="text-[#8b7a6b] mt-1 flex items-center gap-2">
                        <i class='bx bx-calendar-check text-[#7aa57a]'></i> 17 Maret 2026 · Shift Pagi
                    </p>
                </div>
                <!-- Info transaksi -->
                <div
                    class="bg-white rounded-full px-6 py-3 shadow-sm border border-[#e5d9d0] flex items-center gap-4 mt-4 sm:mt-0">
                    <div class="flex items-center gap-2">
                        <i class='bx bx-receipt text-[#7aa57a]'></i>
                        <span class="text-sm font-medium text-[#3d332b]">Transaksi #TRX-789</span>
                    </div>
                    <div class="h-4 w-px bg-[#ddd0c4]"></div>
                    <div class="flex items-center gap-2">
                        <i class='bx bx-time text-[#7aa57a]'></i>
                        <span class="text-sm font-medium text-[#3d332b]">14:45</span>
                    </div>
                </div>
            </div>

            <!-- LAYOUT 2 KOLOM: KIRI (MENU) & KANAN (KERANJANG) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- KOLOM KIRI: DAFTAR MENU (2/3) -->
                <div class="lg:col-span-2">
                    <!-- Filter Kategori -->
                    <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] p-4 mb-5">
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="bg-[#7aa57a] text-white px-4 py-2 rounded-full text-sm font-medium cursor-pointer">Semua</span>
                            <span
                                class="bg-white border border-[#ddd0c4] px-4 py-2 rounded-full text-sm hover:bg-gray-50 cursor-pointer">Makanan</span>
                            <span
                                class="bg-white border border-[#ddd0c4] px-4 py-2 rounded-full text-sm hover:bg-gray-50 cursor-pointer">Minuman</span>
                            <span
                                class="bg-white border border-[#ddd0c4] px-4 py-2 rounded-full text-sm hover:bg-gray-50 cursor-pointer">Snack</span>
                            <span
                                class="bg-white border border-[#ddd0c4] px-4 py-2 rounded-full text-sm hover:bg-gray-50 cursor-pointer">Promo</span>
                        </div>
                    </div>

                    <!-- Grid Menu dengan Info Stok -->
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        <!-- Menu Item 1 - Nasi Goreng (Stok: 45) -->
                        <div class="bg-white rounded-xl border border-[#e5d9d0] p-3 hover:shadow-md transition cursor-pointer relative"
                            onclick="addToCart(1, 'Nasi Goreng Spesial', 35000, 45)">
                            <div
                                class="absolute top-2 right-2 bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded-full">
                                Stok: 45
                            </div>
                            <div class="h-24 bg-[#e0d6cc] rounded-lg mb-2 flex items-center justify-center text-[#8b7a6b]">
                                <i class='bx bx-image-alt text-3xl opacity-40'></i>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-semibold text-[#3d332b]">Nasi Goreng</h3>
                                    <p class="text-xs text-gray-500">Makanan</p>
                                </div>
                                <span class="font-bold text-[#7aa57a]">Rp 35k</span>
                            </div>
                            <button
                                class="mt-2 w-full bg-[#f0f7f0] text-[#7aa57a] py-1.5 rounded-lg text-sm font-medium flex items-center justify-center gap-1 hover:bg-[#7aa57a] hover:text-white transition">
                                <i class='bx bx-plus-circle'></i> Tambah
                            </button>
                        </div>

                        <!-- Menu Item 2 - Es Teh (Stok: 78) -->
                        <div class="bg-white rounded-xl border border-[#e5d9d0] p-3 hover:shadow-md transition cursor-pointer relative"
                            onclick="addToCart(2, 'Es Teh Manis', 8000, 78)">
                            <div
                                class="absolute top-2 right-2 bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded-full">
                                Stok: 78
                            </div>
                            <div class="h-24 bg-[#f7ede2] rounded-lg mb-2 flex items-center justify-center text-[#b48b5a]">
                                <i class='bx bx-image-alt text-3xl opacity-40'></i>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-semibold text-[#3d332b]">Es Teh Manis</h3>
                                    <p class="text-xs text-gray-500">Minuman</p>
                                </div>
                                <span class="font-bold text-[#7aa57a]">Rp 8k</span>
                            </div>
                            <button
                                class="mt-2 w-full bg-[#f0f7f0] text-[#7aa57a] py-1.5 rounded-lg text-sm font-medium flex items-center justify-center gap-1 hover:bg-[#7aa57a] hover:text-white transition">
                                <i class='bx bx-plus-circle'></i> Tambah
                            </button>
                        </div>

                        <!-- Menu Item 3 - Pisang Goreng (Stok: 23) -->
                        <div class="bg-white rounded-xl border border-[#e5d9d0] p-3 hover:shadow-md transition cursor-pointer relative"
                            onclick="addToCart(3, 'Pisang Goreng', 15000, 23)">
                            <div
                                class="absolute top-2 right-2 bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded-full">
                                Stok: 23
                            </div>
                            <div class="h-24 bg-[#f7ede2] rounded-lg mb-2 flex items-center justify-center text-[#b48b5a]">
                                <i class='bx bx-image-alt text-3xl opacity-40'></i>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-semibold text-[#3d332b]">Pisang Goreng</h3>
                                    <p class="text-xs text-gray-500">Snack</p>
                                </div>
                                <span class="font-bold text-[#7aa57a]">Rp 15k</span>
                            </div>
                            <button
                                class="mt-2 w-full bg-[#f0f7f0] text-[#7aa57a] py-1.5 rounded-lg text-sm font-medium flex items-center justify-center gap-1 hover:bg-[#7aa57a] hover:text-white transition">
                                <i class='bx bx-plus-circle'></i> Tambah
                            </button>
                        </div>

                        <!-- Menu Item 4 - Sate Ayam (Stok: 15) -->
                        <div class="bg-white rounded-xl border border-[#e5d9d0] p-3 hover:shadow-md transition cursor-pointer relative"
                            onclick="addToCart(4, 'Sate Ayam', 45000, 15)">
                            <div
                                class="absolute top-2 right-2 bg-yellow-100 text-yellow-800 text-xs px-2 py-0.5 rounded-full">
                                Stok: 15
                            </div>
                            <div class="h-24 bg-[#e0d6cc] rounded-lg mb-2 flex items-center justify-center text-[#8b7a6b]">
                                <i class='bx bx-image-alt text-3xl opacity-40'></i>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-semibold text-[#3d332b]">Sate Ayam</h3>
                                    <p class="text-xs text-gray-500">Makanan</p>
                                </div>
                                <span class="font-bold text-[#7aa57a]">Rp 45k</span>
                            </div>
                            <button
                                class="mt-2 w-full bg-[#f0f7f0] text-[#7aa57a] py-1.5 rounded-lg text-sm font-medium flex items-center justify-center gap-1 hover:bg-[#7aa57a] hover:text-white transition">
                                <i class='bx bx-plus-circle'></i> Tambah
                            </button>
                        </div>

                        <!-- Menu Item 5 - Kopi Tubruk (Stok: 5) - Stok Menipis -->
                        <div class="bg-white rounded-xl border border-[#e5d9d0] p-3 hover:shadow-md transition cursor-pointer relative"
                            onclick="addToCart(5, 'Kopi Tubruk', 12000, 5)">
                            <div class="absolute top-2 right-2 bg-red-100 text-red-800 text-xs px-2 py-0.5 rounded-full">
                                Stok: 5
                            </div>
                            <div class="h-24 bg-[#f7ede2] rounded-lg mb-2 flex items-center justify-center text-[#b48b5a]">
                                <i class='bx bx-image-alt text-3xl opacity-40'></i>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-semibold text-[#3d332b]">Kopi Tubruk</h3>
                                    <p class="text-xs text-gray-500">Minuman</p>
                                </div>
                                <span class="font-bold text-[#7aa57a]">Rp 12k</span>
                            </div>
                            <button
                                class="mt-2 w-full bg-[#f0f7f0] text-[#7aa57a] py-1.5 rounded-lg text-sm font-medium flex items-center justify-center gap-1 hover:bg-[#7aa57a] hover:text-white transition">
                                <i class='bx bx-plus-circle'></i> Tambah
                            </button>
                        </div>

                        <!-- Menu Item 6 - Es Cendol (Stok: 34) -->
                        <div class="bg-white rounded-xl border border-[#e5d9d0] p-3 hover:shadow-md transition cursor-pointer relative"
                            onclick="addToCart(6, 'Es Cendol', 18000, 34)">
                            <div
                                class="absolute top-2 right-2 bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded-full">
                                Stok: 34
                            </div>
                            <div class="h-24 bg-[#f7ede2] rounded-lg mb-2 flex items-center justify-center text-[#b48b5a]">
                                <i class='bx bx-image-alt text-3xl opacity-40'></i>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-semibold text-[#3d332b]">Es Cendol</h3>
                                    <p class="text-xs text-gray-500">Minuman</p>
                                </div>
                                <span class="font-bold text-[#7aa57a]">Rp 18k</span>
                            </div>
                            <button
                                class="mt-2 w-full bg-[#f0f7f0] text-[#7aa57a] py-1.5 rounded-lg text-sm font-medium flex items-center justify-center gap-1 hover:bg-[#7aa57a] hover:text-white transition">
                                <i class='bx bx-plus-circle'></i> Tambah
                            </button>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: KERANJANG BELANJA (1/3) -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] p-5 sticky top-6">
                        <h2 class="text-lg font-semibold text-[#3d332b] mb-4 flex items-center gap-2">
                            <i class='bx bx-shopping-bag text-[#7aa57a]'></i> Keranjang
                            <span class="text-sm bg-[#f0e7df] px-2 py-0.5 rounded-full ml-2" id="cartCount">0
                                item</span>
                        </h2>

                        <!-- Daftar Item di Keranjang -->
                        <div class="space-y-3 max-h-80 overflow-y-auto mb-4 pr-1" id="cartItems">
                            <div class="text-center text-gray-400 py-8">
                                <i class='bx bx-basket text-4xl'></i>
                                <p class="text-sm mt-2">Belum ada item</p>
                            </div>
                        </div>

                        <!-- Ringkasan Total -->
                        <div class="border-t border-[#e5d9d0] pt-4 space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium text-[#3d332b]" id="subtotal">Rp 0</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">PPN (11%)</span>
                                <span class="font-medium text-[#3d332b]" id="tax">Rp 0</span>
                            </div>
                            <div
                                class="flex justify-between text-lg font-bold text-[#3d332b] pt-2 border-t border-[#e5d9d0]">
                                <span>Total</span>
                                <span id="total">Rp 0</span>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="grid grid-cols-2 gap-3 mt-5">
                            <button
                                class="border border-[#b48b5a] text-[#b48b5a] py-3 rounded-xl text-sm font-medium hover:bg-[#fcf9f7] transition flex items-center justify-center gap-1"
                                onclick="clearCart()">
                                <i class='bx bx-trash'></i> Batal
                            </button>
                            <button
                                class="bg-[#7aa57a] text-white py-3 rounded-xl text-sm font-medium hover:bg-[#689268] transition flex items-center justify-center gap-1 disabled:opacity-50 disabled:cursor-not-allowed"
                                id="payButton" disabled onclick="openPaymentModal()">
                                <i class='bx bx-credit-card'></i> Bayar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="mt-8 text-sm text-[#8b7a6b] flex justify-between items-center border-t border-[#e0d3c7] pt-5">
                <span><i class='bx bx-leaf text-[#7aa57a] mr-1'></i> Warung Daun · Transaksi Kasir</span>
                <span><i class='bx bx-printer'></i> Printer Bluetooth: Terhubung (POS-58)</span>
            </div>
        </main>
    </div>
@endsection
