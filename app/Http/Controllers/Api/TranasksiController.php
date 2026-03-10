<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar transaksi berhasil diambil.',
            'data' => $transaksi,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'user_id' => 'required|exists:users,id',
                'taggal' => 'required|date',
                'total' => 'required|numeric',
                'bayar' => 'required|numeric'
            ]);

            $kembali = $request->bayar - $request->total;

            $transaksi = Transaksi::create([
                'kode_transaksi' => 'TRX-' . time(),
                'user_id' => $request->user_id,
                'tanggal' => $request->tanggal,
                'total' => $request->total,
                'bayar' => $request->bayar,
                'kembali' => $kembali
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil',
                'data' => $transaksi
            ], 201);
        } catch (\Throwable $e) {

            return response()->json([
                'success' => false,
                'message' => 'Terjadi error',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Transaksi::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $kembali = $request->bayar - $request->total;

        $transaksi->update([
            'total' => $request->total,
            'bayar' => $request->bayar,
            'kembali' => $kembali
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil diupdate',
            'data' => $transaksi
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaksi dihapus'
        ]);
    }
}
