@extends('layouts.nasabah.layout_nasabah')

@section('content')

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Pengajuan
    </h1>
  </div>
</section>

<section class="section main-section">
  <div class="card mb-6">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-ballot"></i></span>
        Form Pengajuan
      </p>
    </header>
    <div class="card-content">
      @if($errors->any())
      <div class="notification red" style="height:50px; display:flex; align-items:center;">
        {{ $errors->first() }}
      </div>
      @endif

      <form method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="field">
          <label class="label">NIK</label>
          <div class="control icons-left">
            <input class="input" type="text" name="nik" placeholder="Masukkan NIK" required>
            <span class="icon left"><i class="mdi mdi-key"></i></span>
          </div>
        </div>

        <div class="field">
          <label class="label">Nama Lengkap</label>
          <div class="control icons-left">
            <input class="input" type="text" name="nama" placeholder="Masukkan nama lengkap" required>
            <span class="icon left"><i class="mdi mdi-account"></i></span>
          </div>
        </div>

        <div class="field">
          <label class="label">Alamat</label>
          <div class="control icons-left">
            <input class="input" type="text" name="alamat" placeholder="Masukkan alamat" required>
            <span class="icon left"><i class="mdi mdi-home"></i></span>
          </div>
        </div>

        <div class="field">
          <label class="label">Profesi</label>
          <div class="control icons-left">
            <input class="input" type="text" name="profesi" placeholder="Masukkan profesi" required>
            <span class="icon left"><i class="mdi mdi-briefcase"></i></span>
          </div>
        </div>

        <div class="field">
          <label class="label">Agunan</label>
          <div class="control">
            <textarea class="textarea" name="agunan" placeholder="Deskripsikan agunan" required></textarea>
          </div>
        </div>

        <div class="field">
          <label class="label">Taksasi</label>
          <div class="control icons-left">
            <input class="input" type="number" step="0.01" name="taksasi" placeholder="Masukkan nilai taksasi">
            <span class="icon left"><i class="mdi mdi-cash"></i></span>
          </div>
        </div>

        <div class="field">
          <label class="label">Jumlah Plafon</label>
          <div class="control icons-left">
            <input class="input" type="number" step="0.01" name="jumlah_plafon" placeholder="Masukkan jumlah plafon" required>
            <span class="icon left"><i class="mdi mdi-cash-multiple"></i></span>
          </div>
        </div>

        <div class="field">
          <label class="label">Tujuan Pengajuan</label>
          <div class="control">
            <textarea class="textarea" name="tujuan_pengajuan" placeholder="Tuliskan tujuan pengajuan" required></textarea>
          </div>
        </div>

        <div class="field">
          <label class="label">Dokumen Pendukung</label>
          <div class="field file has-name">
            <label class="upload control">
              <a class="button blue">
                <span class="icon"><i class="mdi mdi-upload"></i></span>
                <span>Upload</span>
              </a>
              <input class="file-input" type="file" name="dokumen_pendukung" required onchange="showFileName(this)">
              <span class="file-name" id="file-name">Belum ada file</span>
            </label>
          </div>
        </div>

        <hr>

        <div class="field grouped">
          <div class="control">
            <button type="submit" class="button green">Simpan</button>
          </div>
          <div class="control">
            <button type="reset" class="button red">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  function showFileName(input) {
    if (input.files && input.files.length > 0) {
      document.getElementById('file-name').textContent = input.files[0].name;
    } else {
      document.getElementById('file-name').textContent = 'Belum ada file';
    }
  }
</script>


@endsection