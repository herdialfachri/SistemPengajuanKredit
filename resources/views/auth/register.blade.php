<!DOCTYPE html>
<!--
Template name: Nova
Template author: FreeBootstrap.net
Author website: https://freebootstrap.net/
License: https://freebootstrap.net/license
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT BPR Supra Artapersada</title>

    <!-- ======= Google Font =======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
    <!-- End Google Font-->

    <!-- ======= Styles =======-->
    <link href="assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets/vendors/glightbox/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendors/aos/aos.css" rel="stylesheet">
    <!-- End Styles-->

    <!-- ======= Theme Style =======-->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- End Theme Style-->

    <!-- ======= Apply theme =======-->
    <script>
        // Apply the theme as early as possible to avoid flicker
        (function() {
            const storedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', storedTheme);
        })();
    </script>
</head>

<body>


    <!-- ======= Site Wrap =======-->
    <div class="site-wrap">


        <!-- ======= Header =======-->
        <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="freebootstrap.net navbar">
            <div class="container d-flex align-items-center justify-content-between">


                <!-- Start Logo-->
                <a class="navbar-brand w-auto" href="index.html">
                    <!-- If you use a text logo, uncomment this if it is commented-->
                    <!-- Vertex-->

                    <!-- If you plan to use an image logo, uncomment this if it is commented-->

                    <!-- logo dark--><img class="logo dark img-fluid" src="assets/images/test.png" alt="FreeBootstrap.net image placeholder">

                    <!-- logo light--><img class="logo light img-fluid" src="assets/images/test.png" alt="FreeBootstrap.net image placeholder">

                </a>
                <!-- End Logo-->

                <!-- Start offcanvas-->
                <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1" aria-labelledby="fbs__net-navbarsLabel">


                    <div class="offcanvas-header">
                        <div class="offcanvas-header-logo">
                            <!-- If you use a text logo, uncomment this if it is commented-->

                            <!-- h5#fbs__net-navbarsLabel.offcanvas-title Vertex-->

                            <!-- If you plan to use an image logo, uncomment this if it is commented-->
                            <a class="logo-link" id="fbs__net-navbarsLabel" href="index.html">


                                <!-- logo dark--><img class="logo dark img-fluid" src="assets/images/logo-dark.svg" alt="FreeBootstrap.net image placeholder">

                                <!-- logo light--><img class="logo light img-fluid" src="assets/images/logo-light.svg" alt="FreeBootstrap.net image placeholder"></a>

                        </div>
                        <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body align-items-lg-center">


                        <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link scroll-link" aria-current="page" href="/#home">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="/#about">Tentang Kami</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="/#pricing">Layanan</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="/#how-it-works">Langkah Pengajuan</a></li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="dropdown" aria-expanded="false">Kredit <i class="bi bi-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link scroll-link dropdown-item" href="#">Ajukan Kredit 1 Jam Cair</a></li>
                                    <!-- <li><a class="nav-link scroll-link dropdown-item" href="#services">Additional</a></li> -->
                                    <!-- <li class="nav-item dropstart"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropstart <i class="bi bi-chevron-right"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="nav-link scroll-link dropdown-item" href="#services">Services</a></li>
                                            <li><a class="nav-link scroll-link dropdown-item" href="#pricing">Pricing</a></li>
                                            <li class="nav-item dropstart"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropstart <i class="bi bi-chevron-right"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="nav-link scroll-link dropdown-item" href="#services">Services</a></li>
                                                    <li><a class="nav-link scroll-link dropdown-item" href="#pricing">Pricing</a></li>
                                                    <li><a class="nav-link scroll-link dropdown-item" href="#">Something else here</a></li>
                                                    <li class="nav-item dropend"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropend <i class="bi bi-chevron-right"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="nav-link scroll-link dropdown-item" href="#services">Services</a></li>
                                                            <li><a class="nav-link scroll-link dropdown-item" href="#pricing">Pricing</a></li>
                                                            <li><a class="nav-link scroll-link dropdown-item" href="#">Something else here</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> -->
                                </ul>

                            </li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="/#contact">Kontak</a></li>
                        </ul>

                    </div>
                </div>
                <!-- End offcanvas-->

                <div class="header-social d-flex align-items-center gap-1">
                    <a class="btn btn-primary py-2" href="{{ route('register') }}">Daftar</a>

                    <button class="fbs__net-navbar-toggler justify-content-center align-items-center ms-auto"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#fbs__net-navbars"
                        aria-controls="fbs__net-navbars"
                        aria-label="Toggle navigation"
                        aria-expanded="false">
                        <svg class="fbs__net-icon-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <line x1="21" x2="3" y1="6" y2="6"></line>
                            <line x1="15" x2="3" y1="12" y2="12"></line>
                            <line x1="17" x2="3" y1="18" y2="18"></line>
                        </svg>
                        <svg class="fbs__net-icon-close" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

            </div>
        </header>
        <!-- End Header-->

        <!-- ======= Main =======-->
        <main>

            <!-- ======= Formulir Register =======-->
            <section class="hero__v6 section" id="register">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-6 mx-auto text-center">
                            <h2 class="mb-3">Formulir Registrasi Nasabah</h2>
                            <p>Silakan isi data diri Anda dengan lengkap dan benar</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-wrapper">

                                @if(session('success'))
                                <div class="mt-3 alert alert-success text-center">
                                    {{ session('success') }}
                                    <br>
                                    <a href="{{ route('login') }}" class="fw-bold text-decoration-success ms-2">
                                        Klik di sini untuk login
                                    </a>
                                </div>
                                @endif

                                @if($errors->any())
                                <div class="mt-3 alert alert-danger text-center">
                                    <ul class="mb-0 list-unstyled">
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form id="registerForm" action="{{ route('register.post') }}" method="POST">
                                    @csrf

                                    <!-- Identitas dasar -->
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="nik" class="mb-2">NIK (Sesuai KTP)</label>
                                            <input class="form-control" id="nik" type="text" name="nik" value="{{ old('nik') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nama" class="mb-2">Nama (Sesuai KTP)</label>
                                            <input class="form-control" id="nama" type="text" name="nama" value="{{ old('nama') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email" class="mb-2">Email</label>
                                            <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>

                                    <!-- Data pribadi -->
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="no_hp" class="mb-2">Nomor HP</label>
                                            <input class="form-control" id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tempat_lahir" class="mb-2">Tempat Lahir</label>
                                            <input class="form-control" id="tempat_lahir" type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tanggal_lahir" class="mb-2">Tanggal Lahir</label>
                                            <input class="form-control" id="tanggal_lahir" type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                        </div>
                                    </div>

                                    <!-- Identitas tambahan -->
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="jenis_kelamin" class="mb-2">Jenis Kelamin</label>
                                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                                <option value="" disabled hidden>Pilih Jenis Kelamin</option>
                                                <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="status_perkawinan" class="mb-2">Status Perkawinan</label>
                                            <select class="form-control" id="status_perkawinan" name="status_perkawinan" required>
                                                <option value="" disabled hidden>Pilih Status</option>
                                                <option value="belum menikah" {{ old('status_perkawinan') == 'belum menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                                <option value="menikah" {{ old('status_perkawinan') == 'menikah' ? 'selected' : '' }}>Menikah</option>
                                                <option value="cerai" {{ old('status_perkawinan') == 'cerai' ? 'selected' : '' }}>Bercerai</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="pekerjaan" class="mb-2">Pekerjaan</label>
                                            <input class="form-control" id="pekerjaan" type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" required>
                                        </div>
                                    </div>

                                    <!-- Alamat -->
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label for="alamat" class="mb-2">Alamat Saat Ini</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="1" required>{{ old('alamat') }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="password" class="mb-2">Buat Kata Sandi</label>
                                            <input class="form-control" id="password" type="password" name="password" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="password_confirmation" class="mb-2">Konfirmasi Kata Sandi</label>
                                            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button class="btn btn-primary fw-semibold w-100" type="submit">Daftar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Formulir Register-->

            <!-- Script cek password -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const password = document.getElementById('password');
                    const confirm = document.getElementById('password_confirmation');
                    const help = document.getElementById('passwordHelp');
                    const success = document.getElementById('passwordSuccess');

                    function checkPassword() {
                        if (confirm.value.length > 0) {
                            if (password.value === confirm.value) {
                                help.classList.add('d-none');
                                success.classList.remove('d-none');
                            } else {
                                success.classList.add('d-none');
                                help.classList.remove('d-none');
                            }
                        } else {
                            help.classList.add('d-none');
                            success.classList.add('d-none');
                        }
                    }

                    password.addEventListener('input', checkPassword);
                    confirm.addEventListener('input', checkPassword);
                });
            </script>

        </main>
    </div>

    <!-- ======= Back to Top =======-->
    <button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>
    <!-- End Back to top-->

    <!-- ======= Javascripts =======-->
    <script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/gsap/gsap.min.js"></script>
    <script src="assets/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/vendors/glightbox/glightbox.min.js"></script>
    <script src="assets/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendors/aos/aos.js"></script>
    <script src="assets/vendors/purecounter/purecounter.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/send_email.js"></script>
    <!-- End JavaScripts-->
</body>

</html>