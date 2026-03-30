@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Form Pengajuan Kredit</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ url('/api/pengajuan') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="token" value="{{ session('api_token') }}">

        <div class="mb-3">
            <label>Alamat Sekarang</label>
            <textarea name="alamat_sekarang" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Agunan</label>
            <textarea name="agunan" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Profesi</label>
            <input type="text" name="profesi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jumlah Plafon</label>
            <input type="number" name="jumlah_plafon" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Taksasi</label>
            <input type="number" name="taksasi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tujuan Pengajuan</label>
            <textarea name="tujuan_pengajuan" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Dokumen Pendukung (PDF/JPG/PNG)</label>
            <input type="file" name="dokumen_pendukung" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Kirim Pengajuan</button>
    </form>
</div>
@endsection