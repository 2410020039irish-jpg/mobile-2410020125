<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeskripsiUmum;
use Illuminate\Http\Request;

class DeskripsiUmumController extends Controller
{
    public function index()
    {
        return response()->json(DeskripsiUmum::with('batimetri')->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_abstrak' => 'nullable|integer',
            'observer' => 'required|string',
            'lokasi_observasi' => 'required|string',
            'tanggal_observasi' => 'required|date',
            'metode_analisis' => 'required|string',
        ]);

        $data = DeskripsiUmum::create($validated);
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $data = DeskripsiUmum::with('batimetri')->find($id);
        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $data = DeskripsiUmum::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'id_abstrak' => 'nullable|integer',
            'observer' => 'sometimes|string',
            'lokasi_observasi' => 'sometimes|string',
            'tanggal_observasi' => 'sometimes|date',
            'metode_analisis' => 'sometimes|string',
        ]);

        $data->update($validated);
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = DeskripsiUmum::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $data->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}