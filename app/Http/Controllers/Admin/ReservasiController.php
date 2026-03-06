<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Reservasi::paginate(10);
        return response()->json([
            'success' => true,
            'message' => 'Daftar reservasi berhasil diambil.',
            'data' => $data,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_pelanggan' => 'required',
            'no_hp' => 'required',
            'jumlah_orang' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'catatan' => 'nullable',
            'status' => 'required',
        ]);

        $data = Reservasi::create($validate);

        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil dibuat.',
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Reservasi::findOrFail($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Reservasi tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil diambil.',
            'data' => $data,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservasi = Reservasi::findOrFail($id);

        if (!$reservasi) {
            return response()->json([
                'success' => false,
                'message' => 'Reservasi tidak ditemukan.',
            ], 404);
        }

        $validate = $request->validate([
            'nama_pelanggan' => 'required',
            'no_hp' => 'required',
            'jumlah_orang' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'catatan' => 'nullable',
            'status' => 'required',
        ]);

        $reservasi->update($validate);

        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil diperbarui.',
            'data' => $reservasi,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservasi = Reservasi::findOrFail($id);

        if (!$reservasi) {
            return response()->json([
                'success' => false,
                'message' => 'Reservasi tidak ditemukan.',
            ], 404);
        }

        $reservasi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil dihapus.',
        ], 200);
    }
}

