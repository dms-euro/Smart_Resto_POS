<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class DetailTranasksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DetailTransaksi::with(['menu', 'transaksi'])->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required',
            'menu_id' => 'required',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
        ]);

        $subtotal = $request->jumlah * $request->harga_satuan;

        $data = DetailTransaksi::create([
            'transaksi_id' => $request->transaksi_id,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'subtotal' => $subtotal
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Detail transaksi ditambahkan',
            'data' => $data
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = DetailTransaksi::with('menu')->findOrFail($id);

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
        $detail = DetailTransaksi::findOrFail($id);

        $subtotal = $request->jumlah * $request->harga_satuan;

        $detail->update([
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'subtotal' => $subtotal
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Detail transaksi diperbarui',
            'data' => $detail
        ]);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detail = DetailTransaksi::findOrFail($id);
        $detail->delete();

        return response()->json([
            'success' => true,
            'message' => 'Detail transaksi dihapus'
        ]);
    }
}
