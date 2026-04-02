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
                <a class="navbar-brand w-auto" href="/">
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
                            <li class="nav-item"><a class="nav-link scroll-link active" aria-current="page" href="#home">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#about">Tentang Kami</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#pricing">Layanan</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#how-it-works">Langkah Pengajuan</a></li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Kredit <i class="bi bi-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link scroll-link dropdown-item" href="/formulir-pengajuan">Ajukan Kredit 1 Jam Cair</a></li>
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
                            <li class="nav-item"><a class="nav-link scroll-link" href="#contact">Kontak</a></li>
                        </ul>

                    </div>
                </div>
                <!-- End offcanvas-->

                <div class="header-social d-flex align-items-center gap-1">
                    @guest
                    <a class="btn btn-primary py-2" href="#">Daftar</a>
                    @endguest

                    @auth
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary py-2">Keluar</button>
                    </form>
                    @endauth


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

            <!-- ======= Hero =======-->
            <section class="hero__v6 section" id="home">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="row">
                                <div class="col-lg-11">

                                    <span class="hero-subtitle text-uppercase" data-aos="fade-up" data-aos-delay="0">
                                        Solusi Pinjaman Kredit Terpercaya
                                    </span>

                                    <h1 class="hero-title mb-3" data-aos="fade-up" data-aos-delay="100">
                                        Pinjaman Mudah, Cepat, dan Aman Bersama PT BPR Supra Artapersada
                                    </h1>

                                    <p class="hero-description mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="200">
                                        Dapatkan layanan pinjaman kredit yang aman, proses cepat, dan terpercaya untuk memenuhi kebutuhan finansial Anda.
                                    </p>

                                    <div class="cta d-flex gap-2 mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="300">
                                        <a class="btn" href="{{ route('dashboard') }}">Ajukan Pinjaman</a>
                                        <a class="btn btn-white-outline" href="#how-it-works">
                                            Pelajari Lebih Lanjut
                                            <svg class="lucide lucide-arrow-up-right" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M7 7h10v10"></path>
                                                <path d="M7 17 17 7"></path>
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="logos mb-4" data-aos="fade-up" data-aos-delay="400">
                                        <span class="logos-title text-uppercase mb-4 d-block">
                                            Dipercaya oleh nasabah di berbagai daerah
                                        </span>

                                        <div class="logos-images d-flex gap-4 align-items-center">
                                            <img class="img-fluid js-img-to-inline-svg" src="assets/images/logo/actual-size/logo-air-bnb__black.svg" alt="Company 1" style="width: 110px;">
                                            <img class="img-fluid js-img-to-inline-svg" src="assets/images/logo/actual-size/logo-ibm__black.svg" alt="Company 2" style="width: 80px;">
                                            <img class="img-fluid js-img-to-inline-svg" src="assets/images/logo/actual-size/logo-google__black.svg" alt="Company 3" style="width: 110px;">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="hero-img">
                                <!-- <img class="img-card img-fluid" src="assets/images/hero-img.jpeg" alt="Image card" data-aos="fade-down" data-aos-delay="600"> -->
                                <img class="img-main img-fluid rounded-4" src="assets/images/hero-img-detailed.jpeg" alt="Hero Image" data-aos="fade-in" data-aos-delay="500">
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- End Hero-->


            <!-- ======= About =======-->
            <section class="about__v4 section" id="about">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 order-md-2">
                            <div class="row justify-content-end">
                                <div class="col-md-11 mb-4 mb-md-0">

                                    <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">
                                        Tentang Kami
                                    </span>

                                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="100">
                                        Layanan Pinjaman Kredit yang Aman, Cepat, dan Terpercaya
                                    </h2>

                                    <div data-aos="fade-up" data-aos-delay="200">
                                        <p>
                                            PT BPR Supra Artapersada hadir untuk memberikan solusi keuangan bagi masyarakat melalui layanan pinjaman kredit yang mudah, cepat, dan terpercaya.
                                        </p>
                                        <p>
                                            Dengan komitmen terhadap pelayanan terbaik, kami membantu nasabah dalam memenuhi kebutuhan finansial dengan proses yang transparan dan profesional.
                                        </p>
                                    </div>

                                    <h4 class="small fw-bold mt-4 mb-3" data-aos="fade-up" data-aos-delay="300">
                                        Nilai dan Visi Kami
                                    </h4>

                                    <ul class="d-flex flex-row flex-wrap list-unstyled gap-3 features" data-aos="fade-up" data-aos-delay="400">
                                        <li class="d-flex align-items-center gap-2">
                                            <span class="icon rounded-circle text-center"><i class="bi bi-check"></i></span>
                                            <span class="text">Kepercayaan</span>
                                        </li>

                                        <li class="d-flex align-items-center gap-2">
                                            <span class="icon rounded-circle text-center"><i class="bi bi-check"></i></span>
                                            <span class="text">Keamanan</span>
                                        </li>

                                        <li class="d-flex align-items-center gap-2">
                                            <span class="icon rounded-circle text-center"><i class="bi bi-check"></i></span>
                                            <span class="text">Pelayanan Cepat</span>
                                        </li>

                                        <li class="d-flex align-items-center gap-2">
                                            <span class="icon rounded-circle text-center"><i class="bi bi-check"></i></span>
                                            <span class="text">Transparansi</span>
                                        </li>

                                        <li class="d-flex align-items-center gap-2">
                                            <span class="icon rounded-circle text-center"><i class="bi bi-check"></i></span>
                                            <span class="text">Kepuasan Nasabah</span>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="img-wrap position-relative">
                                <img class="img-fluid rounded-4" src="assets/images/hero-img.jpeg" alt="About Image" data-aos="fade-up" data-aos-delay="0">

                                <div class="mission-statement p-4 rounded-4 d-flex gap-4" data-aos="fade-up" data-aos-delay="100">
                                    <div class="mission-icon text-center rounded-circle">
                                        <i class="bi bi-lightbulb fs-4"></i>
                                    </div>

                                    <div>
                                        <h3 class="text-uppercase fw-bold">Visi & Misi</h3>
                                        <p class="fs-5 mb-0">
                                            Menjadi lembaga keuangan yang terpercaya dalam memberikan solusi pinjaman kredit yang aman & cepat.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- End About-->


            <!-- ======= Pricing =======-->
            <section class="section pricing__v2" id="pricing">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-5 mx-auto text-center"><span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Pricing</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Plan for every budget</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Experience the future of finance with our secure, efficient, and user-friendly financial services</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                            <div class="p-5 rounded-4 price-table h-100">
                                <h3>Personal</h3>
                                <p>Choose a plan that fits your personal financial needs and start managing your finances more effectively.</p>
                                <div class="price mb-4"><strong>$7</strong><span>/ month</span></div>
                                <div><a class="btn" href="#">Get Started</a></div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                            <div class="p-5 rounded-4 price-table h-100">
                                <h3>Personal</h3>
                                <p>Choose a plan that fits your personal financial needs and start managing your finances more effectively.</p>
                                <div class="price mb-4"><strong>$7</strong><span>/ month</span></div>
                                <div><a class="btn" href="#">Get Started</a></div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                            <div class="p-5 rounded-4 price-table popular h-100">
                                <h3>Personal</h3>
                                <p>Choose a plan that fits your personal financial needs and start managing your finances more effectively.</p>
                                <div class="price mb-4"><strong>$7</strong><span>/ month</span></div>
                                <div><a class="btn btn-white hover-outline" href="#">Get Started</a></div>
                            </div>
                        </div>
                        <!-- <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <div class="p-5 rounded-4 price-table popular h-100">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="mb-3">Business</h3>
                    <p>Optimize your business financial operations with our tailored business plans.</p>
                    <div class="price mb-4"><strong class="me-1">$29</strong><span>/ month</span></div>
                    <div><a class="btn btn-white hover-outline" href="#">Get Started</a></div>
                  </div>
                  <div class="col-md-6 pricing-features">
                    <h4 class="text-uppercase fw-bold mb-3">Features</h4>
                    <ul class="list-unstyled d-flex flex-column gap-3">
                      <li class="d-flex gap-2 align-items-start mb-0"><span class="icon rounded-circle position-relative mt-1"><i class="bi bi-check"></i></span><span>Personalized financial insights and reports</span></li>
                      <li class="d-flex gap-2 align-items-start mb-0"><span class="icon rounded-circle position-relative mt-1"><i class="bi bi-check"></i></span><span>Priority customer support</span></li>
                      <li class="d-flex gap-2 align-items-start mb-0"><span class="icon rounded-circle position-relative mt-1"><i class="bi bi-check"></i></span><span>Access to exclusive investment opportunities</span></li>
                      <li class="d-flex gap-2 align-items-start mb-0"><span class="icon rounded-circle position-relative mt-1"><i class="bi bi-check"></i></span><span>AI-driven financial recommendations</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div> -->
                    </div>
                </div>
            </section>
            <!-- End Pricing-->

            <!-- ======= How it works =======-->
            <section class="section howitworks__v1" id="how-it-works">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-6 text-center mx-auto"><span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">How it works</span>
                            <h2 data-aos="fade-up" data-aos-delay="100">How It Works</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Our platform is designed to make managing your finances simple and efficient. Follow these easy steps to get started: </p>
                        </div>
                    </div>
                    <div class="row g-md-5">
                        <div class="col-md-6 col-lg-3">
                            <div class="step-card text-center h-100 d-flex flex-column justify-content-start position-relative" data-aos="fade-up" data-aos-delay="0">
                                <div data-aos="fade-right" data-aos-delay="500"><img class="arch-line" src="assets/images/arch-line.svg" alt="FreeBootstrap.net image placeholder"></div><span class="step-number rounded-circle text-center fw-bold mb-5 mx-auto">1</span>
                                <div>
                                    <h3 class="fs-5 mb-4">Sign Up</h3>
                                    <p>Visit our website or download our app to sign up. Provide basic information to set up your secure account.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                            <div class="step-card reverse text-center h-100 d-flex flex-column justify-content-start position-relative">
                                <div data-aos="fade-right" data-aos-delay="1100"><img class="arch-line reverse" src="assets/images/arch-line-reverse.svg" alt="FreeBootstrap.net image placeholder"></div><span class="step-number rounded-circle text-center fw-bold mb-5 mx-auto">2</span>
                                <h3 class="fs-5 mb-4">Set Up Your Profile</h3>
                                <p>Add your personal or business details to tailor the platform to your specific needs.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="1200">
                            <div class="step-card text-center h-100 d-flex flex-column justify-content-start position-relative">
                                <div data-aos="fade-right" data-aos-delay="1700"><img class="arch-line" src="assets/images/arch-line.svg" alt="FreeBootstrap.net image placeholder"></div><span class="step-number rounded-circle text-center fw-bold mb-5 mx-auto">3</span>
                                <h3 class="fs-5 mb-4">Explore Features</h3>
                                <p>Access your dashboard for a summary of your finances: balances, recent transactions, and insights.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="1800">
                            <div class="step-card last text-center h-100 d-flex flex-column justify-content-start position-relative"><span class="step-number rounded-circle text-center fw-bold mb-5 mx-auto">4</span>
                                <div>
                                    <h3 class="fs-5 mb-4">Invest and Grow</h3>
                                    <p>Discover a variety of investment opportunities tailored to your financial goals.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End How it works-->

            <!-- ======= Stats =======-->
            <section class="stats__v3 section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-wrap content rounded-4" data-aos="fade-up" data-aos-delay="0">
                                <div class="rounded-borders">
                                    <div class="rounded-border-1"></div>
                                    <div class="rounded-border-2"></div>
                                    <div class="rounded-border-3"></div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0 text-center" data-aos="fade-up" data-aos-delay="100">
                                    <div class="stat-item">
                                        <h3 class="fs-1 fw-bold"><span class="purecounter" data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="2">0</span><span>K+</span></h3>
                                        <p class="mb-0">Customer Satisfaction</p>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0 text-center" data-aos="fade-up" data-aos-delay="200">
                                    <div class="stat-item">
                                        <h3 class="fs-1 fw-bold"> <span class="purecounter" data-purecounter-start="0" data-purecounter-end="200" data-purecounter-duration="2">0</span><span>%+</span></h3>
                                        <p class="mb-0">Revenue Increase</p>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0 text-center" data-aos="fade-up" data-aos-delay="300">
                                    <div class="stat-item">
                                        <h3 class="fs-1 fw-bold"><span class="purecounter" data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="2">0</span><span>x</span></h3>
                                        <p class="mb-0">Business Growth</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Stats-->


            <!-- ======= Testimonials =======-->
            <section class="section testimonials__v2" id="testimonials">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-5 mx-auto text-center"><span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Testimonials</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">What Our Users Are Saying</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Real Stories of Success and Satisfaction from Our Diverse Community</p>
                        </div>
                    </div>
                    <div class="row g-4" data-masonry="{&quot;percentPosition&quot;: true }">
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;
                                    Pengajuan kredit modal usaha di BPR Supra cepat sekali, hanya 2 hari kerja cair. Sekarang usaha saya berkembang pesat berkat dukungan pembiayaan ini.
                                    &rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid" src="assets/images/person-sq-2-min.jpg" alt="FreeBootstrap.net image placeholder"></div>
                                    <div class="lh-base"><strong class="d-block">John Davis</strong><span>Small Business Owner</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;
                                    Sebagai pelaku UMKM, pinjaman usaha dari BPR Supra sangat membantu modal kerja. Bunga transparan dan tenor fleksibel membuat kami mudah merencanakan cashflow.
                                    &rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid" src="assets/images/person-sq-1-min.jpg" alt="FreeBootstrap.net image placeholder"></div>
                                    <div class="lh-base"><strong class="d-block">Emily Smith</strong><span>Freelancer</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;
                                    Pinjaman pendidikan di sini membantu saya melunasi biaya kuliah. Proses persetujuan dan pencairan cepat, serta layanan customer service ramah dan profesional.
                                    &rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid" src="assets/images/person-sq-5-min.jpg" alt="FreeBootstrap.net image placeholder"></div>
                                    <div class="lh-base"><strong class="d-block">Michael Rodriguez</strong><span>Investor</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonials-->

            <!-- ======= FAQ =======-->
            <section class="section faq__v2" id="faq">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-md-6 col-lg-7 mx-auto text-center"><span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">FAQ</span>
                            <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">Pertanyaan Umum Pinjaman</h2>
                            <p data-aos="fade-up" data-aos-delay="100">Jawaban cepat untuk pertanyaan umum tentang produk pinjaman PT BPR Supra Artapersada.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mx-auto" data-aos="fade-up" data-aos-delay="200">
                            <div class="faq-content">
                                <div class="accordion custom-accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne"> Bagaimana cara mengajukan pinjaman? </button>
                                        </h2>
                                        <div class="accordion-collapse collapse show" id="panelsStayOpen-collapseOne">
                                            <div class="accordion-body">Isi formulir pengajuan pinjaman, lampirkan KTP dan dokumen pendukung, lalu tim kami akan memproses permohonan Anda dalam 1-2 hari kerja.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo"> Berapa suku bunga pinjaman? </button>
                                        </h2>
                                        <div class="accordion-collapse collapse" id="panelsStayOpen-collapseTwo">
                                            <div class="accordion-body">Suku bunga bervariasi menurut produk pinjaman dan profil nasabah, mulai dari 0.8% - 1.5% per bulan. Kami akan sampaikan simulasi cicilan saat pengajuan.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree"> Berapa lama proses pencairan pinjaman? </button>
                                        </h2>
                                        <div class="accordion-collapse collapse" id="panelsStayOpen-collapseThree">
                                            <div class="accordion-body">Setelah dokumen lengkap dan disetujui, pencairan biasanya dilakukan dalam 1-3 hari kerja.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour"> Apa persyaratan utama pengajuan kredit? </button>
                                        </h2>
                                        <div class="accordion-collapse collapse" id="panelsStayOpen-collapseFour">
                                            <div class="accordion-body">Syarat umum: KTP, NPWP atau surat usaha, slip gaji atau laporan keuangan, dan jaminan (jika diperlukan). Detail disesuaikan dengan produk pinjaman.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive"> Bagaimana cara memantau status pengajuan? </button>
                                        </h2>
                                        <div class="accordion-collapse collapse" id="panelsStayOpen-collapseFive">
                                            <div class="accordion-body">Anda akan menerima SMS/email pemberitahuan status pengajuan, dan bisa cek langsung melalui halaman dashboard nasabah setelah login.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End FAQ-->
            </section>
            <!-- End FAQ-->

            <!-- ======= Contact =======-->
            <section class="section contact__v2" id="contact">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-7 mx-auto text-center"><span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Kontak</span>
                            <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">Hubungi PT BPR Supra Artapersada</h2>
                            <p data-aos="fade-up" data-aos-delay="100">Tim kami siap membantu pertanyaan seputar pengajuan kredit dan layanan pembiayaan.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex gap-5 flex-column">
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="0">
                                    <div class="icon d-block"><i class="bi bi-telephone"></i></div><span> <span class="d-block">Telepon</span><strong>+62 811 222 3344</strong></span>
                                </div>
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="100">
                                    <div class="icon d-block"><i class="bi bi-send"></i></div><span> <span class="d-block">Email</span><strong>info@bpr-supra.co.id</strong></span>
                                </div>
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon d-block"><i class="bi bi-geo-alt"></i></div><span> <span class="d-block">Alamat</span>
                                        <address class="fw-bold">Jl. Sudirman No. 45, Yogyakarta 55281, Indonesia</address>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <form id="contactForm">
                                    <div class="row gap-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="name">Name</label>
                                            <input class="form-control" id="name" type="text" name="name" required="">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-2" for="email">Email</label>
                                            <input class="form-control" id="email" type="email" name="email" required="">
                                        </div>
                                    </div>
                                    <div class="row gap-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="subject">Subject</label>
                                            <input class="form-control" id="subject" type="text" name="subject">
                                        </div>
                                    </div>
                                    <div class="row gap-3 gap-md-0 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="message">Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="5" required=""></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary fw-semibold" type="submit">Send Message</button>
                                </form>
                                <div class="mt-3 d-none alert alert-success" id="successMessage">Message sent successfully!</div>
                                <div class="mt-3 d-none alert alert-danger" id="errorMessage">Message sending failed. Please try again later.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact-->

            <!-- ======= Footer =======-->
            <footer class="footer pt-5 pb-5">
                <div class="container">
                    <div class="row mb-5 pb-4">
                        <div class="col-md-7">
                            <h2 class="fs-5">Daftar Informasi Kredit</h2>
                            <p>Dapatkan update promo pinjaman, bunga spesial, dan tips finansial dari BPR Supra Artapersada.</p>
                        </div>
                        <div class="col-md-5">
                            <form class="d-flex gap-2">
                                <input class="form-control" type="email" placeholder="Email your email" required="">
                                <button class="btn btn-primary fs-6" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-between mb-5 g-xl-5">
                        <div class="col-md-4 mb-5 mb-lg-0">
                            <h3 class="mb-3">Tentang BPR</h3>
                            <p class="mb-4">PT BPR Supra Artapersada merupakan lembaga keuangan lokal yang menyediakan kredit usaha dan konsumtif dengan pelayanan cepat, ramah, dan aman.</p>
                        </div>
                        <div class="col-md-7">
                            <div class="row g-2">
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                    <h3 class="mb-3">Company</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="page-about.html">Leadership</a></li>
                                        <li><a href="page-careers.html">Careers <span class="badge ms-1">we're hiring</span></a></li>
                                        <li><a href="page-case-studies.html">Case Studies</a></li>
                                        <li><a href="page-terms-conditions.html">Terms &amp; Conditions</a></li>
                                        <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="page-404.html">404 page</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                    <h3 class="mb-3">Accounts</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="page-signup.html">Register</a></li>
                                        <li><a href="page-signin.html">Sign in</a></li>
                                        <li><a href="page-forgot-password.html">Fogot Password</a></li>
                                        <li><a href="page-coming-soon.html">Coming soon</a></li>
                                        <li><a href="page-portfolio-masonry.html">Portfolio Masonry</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 quick-contact">
                                    <h3 class="mb-3">Contact</h3>
                                    <p class="d-flex mb-3"><i class="bi bi-geo-alt-fill me-3"></i><span>123 Main Street Apt 4B Springfield, <br> IL 62701 United States</span></p><a class="d-flex mb-3" href="mailto:info@mydomain.com"><i class="bi bi-envelope-fill me-3"></i><span>info@mydomain.com</span></a><a class="d-flex mb-3" href="tel://+123456789900"><i class="bi bi-telephone-fill me-3"></i><span>+1 (234) 5678 9900</span></a><a class="d-flex mb-3" href="https://freebootstrap.net"><i class="bi bi-globe me-3"></i><span>FreeBootstrap.net</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row credits pt-3">
                        <div class="col-xl-8 text-center text-xl-start mb-3 mb-xl-0">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> PT BPR Supra Artapersada.
                            All rights reserved.
                        </div>
                        <div class="col-xl-4 justify-content-start justify-content-xl-end quick-links d-flex flex-column flex-xl-row text-center text-xl-start gap-1">Distributed by<a href="https://themewagon.com" target="_blank">ThemeWagon</a></div>
                    </div>
                </div>
            </footer>
            <!-- End Footer-->

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