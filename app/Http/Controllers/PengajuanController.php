<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\PengajuanLog;

class PengajuanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil user dari token Bearer
        $user = $request->user(); // <-- ini otomatis pake Sanctum

        $pengajuans = Pengajuan::where('user_id', $user->id)->latest()->get();
        return response()->json($pengajuans);
    }

    public function store(Request $request)
    {
        $user = $request->user(); // Ambil user dari API token

        $request->validate([
            'alamat_sekarang' => 'required',
            'agunan' => 'required',
            'profesi' => 'required|max:100',
            'jumlah_plafon' => 'required|numeric',
            'taksasi' => 'required|numeric',
            'tujuan_pengajuan' => 'required',
            'dokumen_pendukung' => 'required|file|mimes:pdf,jpg,png'
        ]);

        $fileName = $request->file('dokumen_pendukung')->store('dokumen', 'public');

        $pengajuan = Pengajuan::create([
            'user_id' => $user->id,  // <-- pake id dari token
            'ao_id' => 1, // nanti bisa diatur AO tertentu
            'alamat_sekarang' => $request->alamat_sekarang,
            'agunan' => $request->agunan,
            'profesi' => $request->profesi,
            'jumlah_plafon' => $request->jumlah_plafon,
            'taksasi' => $request->taksasi,
            'tujuan_pengajuan' => $request->tujuan_pengajuan,
            'dokumen_pendukung' => $fileName,
            'tanggal_pengajuan' => now(),
        ]);

        // buat log awal
        PengajuanLog::create([
            'pengajuan_id' => $pengajuan->id,
            'status' => 'menunggu',
            'keterangan' => 'Pengajuan dibuat oleh user'
        ]);

        return response()->json([
            'message' => 'Pengajuan berhasil dibuat!',
            'pengajuan' => $pengajuan
        ], 201);
    }

    public function show(Request $request, Pengajuan $pengajuan)
    {
        $user = $request->user();

        if ($pengajuan->user_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($pengajuan);
    }
}
