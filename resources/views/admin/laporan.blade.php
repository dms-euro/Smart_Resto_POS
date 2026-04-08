@extends('layouts.app')
@section('title', 'Laporan | Admin')
@section('content')
    <div>
        <div class="flex-1 overflow-y-auto p-6 md:p-8 bg-[#f8f5f2]">
            <!-- header -->
            <div class="flex flex-wrap items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-[#3d332b] flex items-center gap-3">
                        <i class='bx bxs-report text-[#7aa57a]'></i> Laporan Transaksi
                        <span class="text-sm bg-[#e0d6cc] text-[#4a3f37] px-3 py-1 rounded-full font-normal">Maret
                            2026</span>
                    </h1>
                    <p class="text-[#8b7a6b] mt-1 flex items-center gap-2">
                        <i class='bx bx-calendar-check text-[#7aa57a]'></i> Lihat semua transaksi, filter tanggal, dan export
                        laporan
                    </p>
                </div>
                <!-- Tombol Export -->
                <button onclick="exportReport()"
                    class="bg-[#7aa57a] text-white rounded-full px-6 py-2.5 text-sm shadow-md flex items-center gap-2 hover:bg-[#689268] transition-colors mt-4 sm:mt-0">
                    <i class='bx bx-export'></i> Export Laporan
                </button>
            </div>

            <!-- FILTER TANGGAL -->
            <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] p-5 mb-8">
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-2">
                        <i class='bx bx-calendar text-[#7aa57a]'></i>
                        <span class="text-sm font-medium text-[#5f4d40]">Periode:</span>
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        <input type="date" value="2026-03-01"
                            class="px-4 py-2 rounded-full border border-[#ddd0c4] bg-white text-sm focus:ring-2 focus:ring-[#7aa57a]/30">
                        <span class="text-[#8b7a6b]">s/d</span>
                        <input type="date" value="2026-03-16"
                            class="px-4 py-2 rounded-full border border-[#ddd0c4] bg-white text-sm focus:ring-2 focus:ring-[#7aa57a]/30">
                    </div>
                    <button
                        class="bg-[#7aa57a] text-white px-6 py-2 rounded-full text-sm hover:bg-[#689268] transition flex items-center gap-2">
                        <i class='bx bx-filter-alt'></i> Terapkan Filter
                    </button>
                    <button
                        class="border border-[#ddd0c4] px-6 py-2 rounded-full text-sm hover:bg-gray-50 transition flex items-center gap-2">
                        <i class='bx bx-reset'></i> Reset
                    </button>
                </div>
            </div>

            <!-- STATISTIK LAPORAN -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                <div class="bg-white rounded-2xl border border-[#e5d9d0] shadow-sm p-5">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wide">Total Transaksi</p>
                            <p class="text-3xl font-bold text-[#3d332b] mt-1">1.284</p>
                            <p class="text-xs text-green-600 mt-2 flex items-center gap-1"><i class='bx bx-trending-up'></i>
                                +12.3% dari bulan lalu</p>
                        </div>
                        <div class="w-12 h-12 bg-[#e9f0e9] rounded-full flex items-center justify-center text-[#6f9e6f]">
                            <i class='bx bx-receipt text-2xl'></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-[#e5d9d0] shadow-sm p-5">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wide">Pendapatan</p>
                            <p class="text-3xl font-bold text-[#3d332b] mt-1">Rp 89,7jt</p>
                            <p class="text-xs text-green-600 mt-2 flex items-center gap-1"><i class='bx bx-trending-up'></i>
                                +8.5%</p>
                        </div>
                        <div class="w-12 h-12 bg-[#f7ede2] rounded-full flex items-center justify-center text-[#b48b5a]">
                            <i class='bx bx-money text-2xl'></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-[#e5d9d0] shadow-sm p-5">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wide">Rata-rata per Transaksi</p>
                            <p class="text-3xl font-bold text-[#3d332b] mt-1">Rp 69.800</p>
                            <p class="text-xs text-amber-600 mt-2 flex items-center gap-1"><i
                                    class='bx bx-minus-circle'></i>
                                -2.1%</p>
                        </div>
                        <div class="w-12 h-12 bg-[#e0d6cc] rounded-full flex items-center justify-center text-[#8b7a6b]">
                            <i class='bx bx-calculator text-2xl'></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-[#e5d9d0] shadow-sm p-5">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wide">Menu Terlaris</p>
                            <p class="text-xl font-bold text-[#3d332b] mt-1">Nasi Goreng</p>
                            <p class="text-xs text-gray-500 mt-2">432x terjual</p>
                        </div>
                        <div class="w-12 h-12 bg-[#e9f0e9] rounded-full flex items-center justify-center text-[#6f9e6f]">
                            <i class='bx bx-trophy text-2xl'></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- GRAFIK PENJUALAN YANG DIPERBAIKI -->
            <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] p-5 mb-8">
                <div class="flex flex-wrap justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-[#3d332b] flex items-center gap-2">
                        <i class='bx bx-line-chart text-[#7aa57a]'></i> Grafik Penjualan (7 Hari Terakhir)
                    </h2>
                    <div class="flex gap-3">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 bg-[#7aa57a] rounded-full"></span>
                            <span class="text-xs text-gray-600">Pendapatan (Rp)</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 bg-[#b48b5a] rounded-full"></span>
                            <span class="text-xs text-gray-600">Transaksi</span>
                        </div>
                    </div>
                </div>

                <!-- Container grafik dengan tinggi tetap -->
                <div class="relative h-80 w-full">
                    <canvas id="salesChart"></canvas>
                </div>

                <!-- Ringkasan angka -->
                <div class="grid grid-cols-2 md:grid-cols-7 gap-2 mt-6 text-center">
                    <div class="bg-[#f8f5f2] rounded-lg p-2">
                        <div class="text-xs text-gray-500">Sen</div>
                        <div class="font-semibold text-[#3d332b]">Rp 1,2jt</div>
                        <div class="text-xs text-[#7aa57a]">24 trx</div>
                    </div>
                    <div class="bg-[#f8f5f2] rounded-lg p-2">
                        <div class="text-xs text-gray-500">Sel</div>
                        <div class="font-semibold text-[#3d332b]">Rp 1,8jt</div>
                        <div class="text-xs text-[#7aa57a]">32 trx</div>
                    </div>
                    <div class="bg-[#f8f5f2] rounded-lg p-2">
                        <div class="text-xs text-gray-500">Rab</div>
                        <div class="font-semibold text-[#3d332b]">Rp 0,9jt</div>
                        <div class="text-xs text-[#7aa57a]">18 trx</div>
                    </div>
                    <div class="bg-[#f8f5f2] rounded-lg p-2">
                        <div class="text-xs text-gray-500">Kam</div>
                        <div class="font-semibold text-[#3d332b]">Rp 2,1jt</div>
                        <div class="text-xs text-[#7aa57a]">38 trx</div>
                    </div>
                    <div class="bg-[#f8f5f2] rounded-lg p-2">
                        <div class="text-xs text-gray-500">Jum</div>
                        <div class="font-semibold text-[#3d332b]">Rp 2,4jt</div>
                        <div class="text-xs text-[#7aa57a]">42 trx</div>
                    </div>
                    <div class="bg-[#f8f5f2] rounded-lg p-2">
                        <div class="text-xs text-gray-500">Sab</div>
                        <div class="font-semibold text-[#3d332b]">Rp 1,7jt</div>
                        <div class="text-xs text-[#7aa57a]">29 trx</div>
                    </div>
                    <div class="bg-[#f8f5f2] rounded-lg p-2">
                        <div class="text-xs text-gray-500">Min</div>
                        <div class="font-semibold text-[#3d332b]">Rp 1,3jt</div>
                        <div class="text-xs text-[#7aa57a]">22 trx</div>
                    </div>
                </div>
            </div>

            <!-- TABEL TRANSAKSI -->
            <div class="bg-white rounded-2xl shadow-sm border border-[#e5d9d0] overflow-hidden">
                <div class="p-4 border-b border-[#e5d9d0] bg-[#f8f5f2] flex justify-between items-center">
                    <h2 class="font-semibold text-[#3d332b] flex items-center gap-2">
                        <i class='bx bx-list-ul text-[#7aa57a]'></i> Daftar Transaksi
                    </h2>
                    <div class="flex gap-2">
                        <button onclick="exportExcel()"
                            class="text-sm bg-white border border-[#ddd0c4] px-4 py-1.5 rounded-full flex items-center gap-1 hover:bg-gray-50">
                            <i class='bx bx-file text-[#7aa57a]'></i> Excel
                        </button>
                        <button onclick="exportPDF()"
                            class="text-sm bg-white border border-[#ddd0c4] px-4 py-1.5 rounded-full flex items-center gap-1 hover:bg-gray-50">
                            <i class='bx bx-file-pdf text-[#b48b5a]'></i> PDF
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-[#f8f5f2] text-[#6b5b4c] border-b border-[#e0d3c7]">
                            <tr>
                                <th class="text-left py-4 px-6 font-medium">ID Transaksi</th>
                                <th class="text-left py-4 px-6 font-medium">Tanggal</th>
                                <th class="text-left py-4 px-6 font-medium">Pelanggan</th>
                                <th class="text-left py-4 px-6 font-medium">Items</th>
                                <th class="text-left py-4 px-6 font-medium">Total</th>
                                <th class="text-left py-4 px-6 font-medium">Pembayaran</th>
                                <th class="text-left py-4 px-6 font-medium">Kasir</th>
                                <th class="text-left py-4 px-6 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#f0e7df]">
                            <!-- row 1 -->
                            <tr class="hover:bg-[#fcf9f7] transition-colors">
                                <td class="py-4 px-6 font-mono text-sm">#TRX-782</td>
                                <td class="py-4 px-6">15 Mar 2026, 11:20</td>
                                <td class="py-4 px-6">Budi (dine in)</td>
                                <td class="py-4 px-6">4 item</td>
                                <td class="py-4 px-6 font-medium">Rp 185.000</td>
                                <td class="py-4 px-6">Tunai</td>
                                <td class="py-4 px-6">Dewi</td>
                                <td class="py-4 px-6"><span
                                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Selesai</span>
                                </td>
                            </tr>
                            <!-- row 2 -->
                            <tr class="hover:bg-[#fcf9f7] transition-colors">
                                <td class="py-4 px-6 font-mono">#TRX-781</td>
                                <td class="py-4 px-6">15 Mar 2026, 10:45</td>
                                <td class="py-4 px-6">Anita</td>
                                <td class="py-4 px-6">2 item</td>
                                <td class="py-4 px-6 font-medium">Rp 94.500</td>
                                <td class="py-4 px-6">QRIS</td>
                                <td class="py-4 px-6">Rama</td>
                                <td class="py-4 px-6"><span
                                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Selesai</span>
                                </td>
                            </tr>
                            <!-- row 3 -->
                            <tr class="hover:bg-[#fcf9f7] transition-colors">
                                <td class="py-4 px-6 font-mono">#TRX-780</td>
                                <td class="py-4 px-6">15 Mar 2026, 09:30</td>
                                <td class="py-4 px-6">Kelompok 4</td>
                                <td class="py-4 px-6">8 item</td>
                                <td class="py-4 px-6 font-medium">Rp 424.000</td>
                                <td class="py-4 px-6">Kartu</td>
                                <td class="py-4 px-6">Admin</td>
                                <td class="py-4 px-6"><span
                                        class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs">Pending</span>
                                </td>
                            </tr>
                            <!-- row 4 -->
                            <tr class="hover:bg-[#fcf9f7] transition-colors">
                                <td class="py-4 px-6 font-mono">#TRX-779</td>
                                <td class="py-4 px-6">14 Mar 2026, 18:15</td>
                                <td class="py-4 px-6">Pak RT</td>
                                <td class="py-4 px-6">12 item</td>
                                <td class="py-4 px-6 font-medium">Rp 650.000</td>
                                <td class="py-4 px-6">Tunai</td>
                                <td class="py-4 px-6">Dewi</td>
                                <td class="py-4 px-6"><span
                                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Selesai</span>
                                </td>
                            </tr>
                            <!-- row 5 -->
                            <tr class="hover:bg-[#fcf9f7] transition-colors">
                                <td class="py-4 px-6 font-mono">#TRX-778</td>
                                <td class="py-4 px-6">14 Mar 2026, 15:20</td>
                                <td class="py-4 px-6">Online (gofood)</td>
                                <td class="py-4 px-6">3 item</td>
                                <td class="py-4 px-6 font-medium">Rp 130.200</td>
                                <td class="py-4 px-6">Online</td>
                                <td class="py-4 px-6">Kasir 2</td>
                                <td class="py-4 px-6"><span
                                        class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs">Diproses</span>
                                </td>
                            </tr>
                            <!-- row 6 -->
                            <tr class="hover:bg-[#fcf9f7] transition-colors">
                                <td class="py-4 px-6 font-mono">#TRX-777</td>
                                <td class="py-4 px-6">14 Mar 2026, 12:10</td>
                                <td class="py-4 px-6">Rina</td>
                                <td class="py-4 px-6">5 item</td>
                                <td class="py-4 px-6 font-medium">Rp 267.000</td>
                                <td class="py-4 px-6">QRIS</td>
                                <td class="py-4 px-6">Dewi</td>
                                <td class="py-4 px-6"><span
                                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Selesai</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION & SUMMARY -->
                <div
                    class="flex flex-wrap justify-between items-center px-6 py-4 bg-[#f8f5f2] border-t border-[#e5d9d0] text-sm text-[#8b7a6b]">
                    <div class="flex items-center gap-4">
                        <span>Menampilkan 1-6 dari 1.284 transaksi</span>
                        <span class="flex items-center gap-1">
                            <i class='bx bx-dollar-circle text-[#7aa57a]'></i>
                            Total: Rp 1.750.700 (ditampilkan)
                        </span>
                    </div>
                    <div class="flex gap-2 mt-2 sm:mt-0">
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4] cursor-pointer hover:bg-gray-50">
                            <i class='bx bx-chevron-left text-xs'></i>
                        </span>
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-[#7aa57a] text-white">1</span>
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4] cursor-pointer hover:bg-gray-50">2</span>
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4] cursor-pointer hover:bg-gray-50">3</span>
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4] cursor-pointer hover:bg-gray-50">4</span>
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4] cursor-pointer hover:bg-gray-50">5</span>
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-[#ddd0c4] cursor-pointer hover:bg-gray-50">
                            <i class='bx bx-chevron-right text-xs'></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- RINGKASAN BULANAN -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">
                <div class="bg-white rounded-2xl border border-[#e5d9d0] p-5">
                    <h3 class="font-semibold text-[#3d332b] mb-3 flex items-center gap-2">
                        <i class='bx bx-calendar-week text-[#7aa57a]'></i> Transaksi per Hari
                    </h3>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Senin</span>
                            <span class="font-medium">245 transaksi</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Selasa</span>
                            <span class="font-medium">198 transaksi</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Rabu</span>
                            <span class="font-medium">210 transaksi</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Kamis</span>
                            <span class="font-medium">234 transaksi</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Jumat</span>
                            <span class="font-medium">267 transaksi</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-[#e5d9d0] p-5">
                    <h3 class="font-semibold text-[#3d332b] mb-3 flex items-center gap-2">
                        <i class='bx bx-credit-card text-[#7aa57a]'></i> Metode Pembayaran
                    </h3>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Tunai</span>
                            <span class="font-medium">45% (578)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">QRIS</span>
                            <span class="font-medium">32% (411)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Kartu</span>
                            <span class="font-medium">15% (192)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Online</span>
                            <span class="font-medium">8% (103)</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-[#e5d9d0] p-5">
                    <h3 class="font-semibold text-[#3d332b] mb-3 flex items-center gap-2">
                        <i class='bx bx-trending-up text-[#7aa57a]'></i> Top 5 Menu
                    </h3>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Nasi Goreng</span>
                            <span class="font-medium">432x</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Es Teh Manis</span>
                            <span class="font-medium">398x</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Sate Ayam</span>
                            <span class="font-medium">287x</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Pisang Goreng</span>
                            <span class="font-medium">245x</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">Kopi Tubruk</span>
                            <span class="font-medium">198x</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="mt-8 text-sm text-[#8b7a6b] flex justify-between items-center border-t border-[#e0d3c7] pt-5">
                <span><i class='bx bx-leaf text-[#7aa57a] mr-1'></i> Warung Daun · Laporan Transaksi</span>
                <span><i class='bx bx-printer'></i> Terakhir dicetak: 16 Mar 2026 14:30</span>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // Inisialisasi Chart.js dengan tampilan yang lebih baik
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');

            // Gradient untuk area fill
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(122, 165, 122, 0.3)');
            gradient.addColorStop(1, 'rgba(122, 165, 122, 0.0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                    datasets: [
                        {
                            label: 'Pendapatan (Rp)',
                            data: [1200000, 1800000, 900000, 2100000, 2400000, 1700000, 1300000],
                            borderColor: '#7aa57a',
                            backgroundColor: gradient,
                            borderWidth: 3,
                            pointBackgroundColor: '#7aa57a',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 8,
                            tension: 0.3,
                            fill: true,
                            yAxisID: 'y',
                            order: 1
                        },
                        {
                            label: 'Jumlah Transaksi',
                            data: [24, 32, 18, 38, 42, 29, 22],
                            borderColor: '#b48b5a',
                            backgroundColor: 'rgba(180, 139, 90, 0.1)',
                            borderWidth: 2,
                            borderDash: [5, 5],
                            pointBackgroundColor: '#b48b5a',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 7,
                            tension: 0.3,
                            fill: false,
                            yAxisID: 'y1',
                            order: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        legend: {
                            display: false // Disable karena sudah ada legend manual di atas
                        },
                        tooltip: {
                            backgroundColor: '#3d332b',
                            titleColor: '#ffffff',
                            bodyColor: '#e0d3c7',
                            borderColor: '#b48b5a',
                            borderWidth: 1,
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.dataset.label.includes('Pendapatan')) {
                                        label += 'Rp ' + context.raw.toLocaleString('id-ID');
                                    } else {
                                        label += context.raw + ' transaksi';
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            title: {
                                display: true,
                                text: 'Pendapatan (Rp)',
                                color: '#7aa57a',
                                font: {
                                    weight: 'bold',
                                    size: 11
                                }
                            },
                            ticks: {
                                callback: function(value) {
                                    if (value >= 1000000) {
                                        return 'Rp ' + (value / 1000000).toFixed(1) + 'jt';
                                    }
                                    return 'Rp ' + value.toLocaleString('id-ID');
                                }
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            }
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            title: {
                                display: true,
                                text: 'Jumlah Transaksi',
                                color: '#b48b5a',
                                font: {
                                    weight: 'bold',
                                    size: 11
                                }
                            },
                            ticks: {
                                stepSize: 10,
                                callback: function(value) {
                                    return value + 'x';
                                }
                            },
                            grid: {
                                drawOnChartArea: false // Hanya grid dari sumbu kiri
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
        });

        // Fungsi export (simulasi)
        function exportReport() {
            Swal.fire({
                icon: 'success',
                title: 'Laporan diexport',
                text: 'Laporan periode Maret 2026 berhasil diexport (demo)',
                timer: 2000,
                showConfirmButton: false,
                background: '#f8f5f2',
                customClass: { popup: 'rounded-2xl' }
            });
        }

        function exportExcel() {
            Swal.fire({
                icon: 'info',
                title: 'Export Excel',
                text: 'File Excel sedang diproses (demo)',
                timer: 1500,
                showConfirmButton: false,
                background: '#f8f5f2',
                customClass: { popup: 'rounded-2xl' }
            });
        }

        function exportPDF() {
            Swal.fire({
                icon: 'info',
                title: 'Export PDF',
                text: 'File PDF sedang diproses (demo)',
                timer: 1500,
                showConfirmButton: false,
                background: '#f8f5f2',
                customClass: { popup: 'rounded-2xl' }
            });
        }
    </script>
@endpush
