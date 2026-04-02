<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengajuanController extends Controller
{
    // ================= GET ALL =================
    public function index(Request $request)
    {
        // Ambil semua data pengajuan dari tabel pengajuans
        $data = Pengajuan::latest()->get();

        return response()->json([
            'message' => 'Data pengajuan',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        // Ambil satu data pengajuan berdasarkan ID
        $data = Pengajuan::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'data' => $data
        ]);
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:pengajuan',
            'nama' => 'required',
            'alamat' => 'required',
            'profesi' => 'required',
            'agunan' => 'required',
            'taksasi' => 'required|numeric',
            'jumlah_plafon' => 'required|numeric',
            'tujuan_pengajuan' => 'required',
            'dokumen_pendukung' => 'required',
        ]);

        $pengajuan = Pengajuan::create([
            'user_id' => $request->user()->id,
            'referral_id' => $request->referral_id,
            'approve_id' => $request->approve_id,

            'kode_pengajuan' => 'P' . rand(1000, 9999),

            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'profesi' => $request->profesi,
            'agunan' => $request->agunan,
            'taksasi' => $request->taksasi,
            'jumlah_plafon' => $request->jumlah_plafon,
            'tujuan_pengajuan' => $request->tujuan_pengajuan,
            'dokumen_pendukung' => $request->dokumen_pendukung,

            'status' => 'menunggu'
        ]);

        return response()->json([
            'message' => 'Pengajuan berhasil dibuat',
            'data' => $pengajuan
        ], 201);
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::find($id);

        if (!$pengajuan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $pengajuan->update($request->all());

        return response()->json([
            'message' => 'Pengajuan berhasil diupdate',
            'data' => $pengajuan
        ]);
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);

        if (!$pengajuan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $pengajuan->delete();

        return response()->json([
            'message' => 'Pengajuan berhasil dihapus'
        ]);
    }
}
