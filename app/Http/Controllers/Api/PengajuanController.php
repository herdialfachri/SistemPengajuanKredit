<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengajuanController extends Controller
{
    // ================= GET ALL =================
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'marketing') {
            // ambil pengajuan yang direferensikan oleh marketing yang login
            $data = Pengajuan::where('referral_id', $user->id)
                ->with('referral')
                ->latest()
                ->get();
        } else {
            // default: ambil pengajuan milik user sendiri
            $data = Pengajuan::where('user_id', $user->id)
                ->with('referral')
                ->latest()
                ->get();
        }

        $data->each->append('dokumen_pendukung_url');

        return response()->json([
            'message' => 'Data pengajuan',
            'data'    => $data,
        ]);
    }

    // ================= SHOW =================
    public function show($id)
    {
        $data = Pengajuan::find($id);

        if (! $data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $data->append('dokumen_pendukung_url');

        return response()->json(['data' => $data]);
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        $request->validate([
            'nik'              => 'required|unique:pengajuan',
            'nama'             => 'required',
            'alamat'           => 'required',
            'profesi'          => 'required',
            'agunan'           => 'required',
            'taksasi'          => 'nullable|numeric',
            'jumlah_plafon'    => 'required|numeric',
            'tujuan_pengajuan' => 'required',
            'dokumen_pendukung' => 'required|file|mimes:pdf|max:10240',
            'referral_id'      => 'required|exists:users,id',
        ]);

        // -> variabel untuk menyimpan file ke storage/app/public/dokumen
        $path = $request->file('dokumen_pendukung')->store('dokumen', 'public');

        $pengajuan = Pengajuan::create([
            'user_id'          => $request->user()->id,
            'referral_id'      => $request->referral_id,
            'approve_id'       => $request->approve_id,
            'kode_pengajuan'   => 'P' . rand(1000, 9999),
            'nik'              => $request->nik,
            'nama'             => $request->nama,
            'alamat'           => $request->alamat,
            'profesi'          => $request->profesi,
            'agunan'           => $request->agunan,
            'taksasi'          => $request->taksasi,
            'jumlah_plafon'    => $request->jumlah_plafon,
            'tujuan_pengajuan' => $request->tujuan_pengajuan,
            'dokumen_pendukung' => $path, // -> pemanggilan variabel untuk simpan path file ke database
            'status'           => 'menunggu',
        ]);

        return response()->json([
            'message' => 'Pengajuan berhasil dibuat',
            'data'    => $pengajuan,
        ], 201);
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::find($id);

        if (! $pengajuan) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $pengajuan->update($request->all());

        return response()->json([
            'message' => 'Pengajuan berhasil diupdate',
            'data'    => $pengajuan,
        ]);
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);

        if (! $pengajuan) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $pengajuan->delete();

        return response()->json([
            'message' => 'Pengajuan berhasil dihapus',
        ]);
    }
}
