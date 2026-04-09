<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
            'data'    => $data,
        ]);
    }

    // ================= STORE =================
    public function store(Request $request, $pengajuan_id)
    {
        $request->validate([
            'jumlah_cair'       => 'required|numeric',
            'tanggal_cair'      => 'required|date',
            'dokumentasi'       => 'required|file|mimes:pdf|max:10240',
            'dokumen_pendukung' => 'required|file|mimes:pdf|max:10240',
            'catatan'           => 'nullable|string',
        ]);

        $pengajuan = Pengajuan::findOrFail($pengajuan_id);

        // simpan file ke storage/app/public
        $dokumentasiPath = $request->file('dokumentasi')->store('dokumentasi', 'public');
        $dokumenPendukungPath = $request->file('dokumen_pendukung')->store('dokumen_pendukung', 'public');

        $pencairan = Pencairan::create([
            'pengajuan_id'      => $pengajuan->id,
            'admin_id'          => $request->user()->id,
            'jumlah_cair'       => $request->jumlah_cair,
            'tanggal_cair'      => $request->tanggal_cair,
            'catatan'           => $request->catatan,
            'dokumentasi'       => $dokumentasiPath,
            'dokumen_pendukung' => $dokumenPendukungPath,
            'status'            => 'selesai',
        ]);

        $pengajuan->update(['status' => 'dicairkan']);

        return response()->json([
            'message' => 'Pencairan berhasil dibuat dan status pengajuan diubah menjadi dicairkan',
            'data'    => $pencairan,
        ], 201);
    }

    // ================= SHOW =================
    public function show($id)
    {
        $data = Pencairan::find($id);

        if (! $data) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'data' => $data,
        ]);
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $pencairan = Pencairan::find($id);

        if (! $pencairan) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $pencairan->update($request->all());

        return response()->json([
            'message' => 'Pencairan berhasil diupdate',
            'data'    => $pencairan,
        ]);
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        $pencairan = Pencairan::find($id);

        if (! $pencairan) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $pencairan->delete();

        return response()->json([
            'message' => 'Pencairan berhasil dihapus',
        ]);
    }
}
