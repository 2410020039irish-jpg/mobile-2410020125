<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Batimetri;
use Illuminate\Http\Request;

class BatimetriController extends Controller
{
    public function index()
    {
        return response()->json(Batimetri::with('deskripsiUmum')->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_data' => 'required|exists:deskripsi_umums,id_data',
            'id_analisis' => 'nullable|integer',
            'pembahasan' => 'required|string',
        ]);

        $batimetri = Batimetri::create($validated);
        return response()->json($batimetri, 201);
    }

    public function show($id)
    {
        $batimetri = Batimetri::with('deskripsiUmum')->find($id);
        if (!$batimetri) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($batimetri, 200);
    }

    public function update(Request $request, $id)
    {
        $batimetri = Batimetri::find($id);
        if (!$batimetri) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'id_data' => 'sometimes|exists:deskripsi_umums,id_data',
            'id_analisis' => 'nullable|integer',
            'pembahasan' => 'sometimes|string',
        ]);

        $batimetri->update($validated);
        return response()->json($batimetri, 200);
    }

    public function destroy($id)
    {
        $batimetri = Batimetri::find($id);
        if (!$batimetri) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $batimetri->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}