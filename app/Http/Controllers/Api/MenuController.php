<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::with('kategori')->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar menu berhasil diambil.',
            'data' => $menu,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request([
            'kategori_id' => 'requiered',
            'nama_menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required',
            'status' => 'required',
        ]);

        $data = Menu::create($validate);

        return response()->json([
            'success' => true,
            'message' => 'Menu Berhasil Ditambahkan',
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Menu::with('kategori')->findOrFail($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Menu tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil diambil.',
            'data' => $data,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::findOrFail($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu tidak ditemukan.',
            ], 404);
        }

        $validate = $request->validate([
            'kategori_id' => 'requiered',
            'nama_menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required',
            'status' => 'required',
        ]);

        $menu->update($validate);
        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil diupdate.',
            'data' => $menu,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu tidak ditemukan.',
            ], 404);
        }

        $menu->delete();
        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil dihapus.',
        ], 200);
    }
}
