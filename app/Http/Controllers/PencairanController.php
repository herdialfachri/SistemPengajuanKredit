<?php

namespace App\Http\Controllers;

use App\Models\Pencairan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PencairanController extends Controller
{
    // ================= GET ALL =================
    public function index()
    {
        $data = Pencairan::latest()->get();

        return response()->json([
            'message' => 'Data pencairan',
            'data' => $data
        ]);
    }

    // ================= STORE =================
    public function store(Request $request, $pengajuan_id)
    {
        $request->validate([
            'jumlah_cair' => 'required|numeric',
            'tanggal_cair' => 'required|date',
            'dokumentasi' => 'required|string',
            'dokumen_pendukung' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $pengajuan = Pengajuan::findOrFail($pengajuan_id);

        $pencairan = Pencairan::create([
            'pengajuan_id' => $pengajuan->id,
            'admin_id' => $request->user()->id, // otomatis ambil admin yg login
            'jumlah_cair' => $request->jumlah_cair,
            'tanggal_cair' => $request->tanggal_cair,
            'catatan' => $request->catatan,
            'dokumentasi' => $request->dokumentasi,
            'dokumen_pendukung' => $request->dokumen_pendukung,
            'status_cair' => true
        ]);

        return response()->json([
            'message' => 'Pencairan berhasil dibuat',
            'data' => $pencairan
        ], 201);
    }

    // ================= SHOW =================
    public function show($id)
    {
        $data = Pencairan::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'data' => $data
        ]);
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $pencairan = Pencairan::find($id);

        if (!$pencairan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $pencairan->update($request->all());

        return response()->json([
            'message' => 'Pencairan berhasil diupdate',
            'data' => $pencairan
        ]);
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        $pencairan = Pencairan::find($id);

        if (!$pencairan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $pencairan->delete();

        return response()->json([
            'message' => 'Pencairan berhasil dihapus'
        ]);
    }
}
