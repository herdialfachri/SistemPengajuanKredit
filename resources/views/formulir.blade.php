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

            <!-- ======= Formulir =======-->
            <section class="hero__v6 section" id="home">
                <div class="container">
                    <!-- Heading Formulir -->
                    <div class="row mb-5">
                        <div class="col-md-6 mx-auto text-center">
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">
                                Formulir Pengajuan
                            </h2>
                            <p data-aos="fade-up" data-aos-delay="200">
                                Silakan isi formulir berikut dengan jujur dan benar
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <form id="permohonanForm" action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Baris 1 -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="mb-2" for="nik">NIK (Sesuai KTP)</label>
                                            <input class="form-control" id="nik" type="text" name="nik" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2" for="nama">Nama (Sesuai KTP)</label>
                                            <input class="form-control" id="nama" type="text" name="nama" required>
                                        </div>
                                    </div>

                                    <!-- Baris 2 -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="mb-2" for="alamat">Alamat Lengkap Saat Ini</label>
                                            <input class="form-control" id="alamat" type="text" name="alamat" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2" for="usaha">Usaha Saat Ini</label>
                                            <input class="form-control" id="usaha" type="text" name="usaha" required>
                                        </div>
                                    </div>

                                    <!-- Baris 3 -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="mb-2" for="agunan">Agunan</label>
                                            <input class="form-control" id="agunan" type="text" name="agunan">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2" for="taksasi">Perkiraan Taksasi</label>
                                            <input class="form-control" id="taksasi" type="number" name="taksasi">
                                        </div>
                                    </div>

                                    <!-- Baris 4 -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="mb-2" for="plafond">Plafond Yang Diajukan</label>
                                            <input class="form-control" id="plafond" type="number" name="plafond" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2" for="tujuan">Tujuan Pinjaman</label>
                                            <input class="form-control" id="tujuan" type="text" name="tujuan" required>
                                        </div>
                                    </div>

                                    <!-- Upload + Tombol dalam 1 baris -->
                                    <div class="row mb-3 align-items-end">
                                        <div class="col-md-6">
                                            <label class="mb-2" for="dokumen">
                                                Dokumen Pendukung PDF
                                                <a href="https://drive.google.com/your-link-panduan" target="_blank" class="ms-2 text-primary fw-semibold" style="font-size: 0.9em;">
                                                    Lihat Panduan
                                                </a>
                                            </label>
                                            <input class="form-control" id="dokumen" type="file" name="dokumen" accept=".pdf" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 d-block">&nbsp;</label>
                                            <button class="btn btn-primary fw-semibold w-100" type="submit">Kirim Permohonan</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="mt-3 d-none alert alert-success" id="successMessage">Permohonan berhasil dikirim!</div>
                                <div class="mt-3 d-none alert alert-danger" id="errorMessage">Pengiriman gagal. Silakan coba lagi.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Formulir-->

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