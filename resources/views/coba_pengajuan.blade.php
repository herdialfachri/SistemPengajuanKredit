@extends('layouts.app')

@section('content')
<h1>Coba Pengajuan Kredit</h1>

<form id="pengajuanForm" enctype="multipart/form-data">
    @csrf
    <label>Alamat Sekarang:</label><br>
    <textarea name="alamat_sekarang" required></textarea><br><br>

    <label>Agunan:</label><br>
    <textarea name="agunan" required></textarea><br><br>

    <label>Profesi:</label><br>
    <input type="text" name="profesi" required><br><br>

    <label>Jumlah Plafon:</label><br>
    <input type="number" name="jumlah_plafon" required><br><br>

    <label>Taksasi:</label><br>
    <input type="number" name="taksasi" required><br><br>

    <label>Tujuan Pengajuan:</label><br>
    <textarea name="tujuan_pengajuan" required></textarea><br><br>

    <label>Dokumen Pendukung (PDF/JPG/PNG):</label><br>
    <input type="file" name="dokumen_pendukung" required><br><br>

    <button type="submit">Kirim Pengajuan</button>
</form>

<div id="result" style="margin-top:20px;"></div>

<script>
document.getElementById('pengajuanForm').addEventListener('submit', async function(e){
    e.preventDefault();

    const form = e.target;
    const data = new FormData(form);

    // Ganti ini dengan token API user yang sudah login
    const token = prompt("Masukkan API Token Bearer Anda:");

    const response = await fetch("{{ url('/api/pengajuan') }}", {
        method: "POST",
        headers: {
            "Authorization": "Bearer " + token
        },
        body: data
    });

    const resultDiv = document.getElementById('result');
    if(response.ok){
        const resJson = await response.json();
        resultDiv.innerHTML = `<pre>${JSON.stringify(resJson, null, 2)}</pre>`;
    } else {
        const error = await response.json();
        resultDiv.innerHTML = `<pre style="color:red">${JSON.stringify(error, null, 2)}</pre>`;
    }
});
</script>
@endsection
