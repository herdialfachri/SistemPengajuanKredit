<!DOCTYPE html>
<html lang="en" class="form-screen">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Admin One Tailwind CSS Admin Dashboard</title>

    <!-- Tailwind is included -->
    <link rel="stylesheet" href="assets/dashboard/css/main.css?v=1772427751095">

    <link rel="apple-touch-icon" sizes="180x180" href="assets/dashboard/img/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/dashboard/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/dashboard/img/favicon-16x16.png" />
    <link rel="mask-icon" href="assets/dashboard/img/safari-pinned-tab.svg" color="#00b4b6" />

    <meta name="description" content="Admin One - free Tailwind dashboard">

    <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
    <meta property="og:site_name" content="JustBoil.me">
    <meta property="og:title" content="Admin One HTML">
    <meta property="og:description" content="Admin One - free Tailwind dashboard">
    <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1920">
    <meta property="og:image:height" content="960">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Admin One HTML">
    <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
    <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
    <meta property="twitter:image:width" content="1920">
    <meta property="twitter:image:height" content="960">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-130795909-1');
    </script>

</head>

<body>

    <div id="app">
        <section class="section main-section">
            <div class="card" style="max-width: 600px; margin: auto;">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-plus"></i></span>
                        Register
                    </p>
                </header>
                <div class="card-content">

                    @if($errors->any())
                    <div class="notification red" style="height:50px; display:flex; align-items:center;">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="field spaced">
                            <label class="label">NIK</label>
                            <input class="input" type="text" name="nik" required>
                        </div>

                        <div class="field spaced">
                            <label class="label">Nama Lengkap</label>
                            <input class="input" type="text" name="nama" required>
                        </div>

                        <div class="field spaced">
                            <label class="label">Email</label>
                            <input class="input" type="email" name="email" placeholder="user@example.com" required>
                        </div>

                        <div class="field spaced">
                            <label class="label">Kata Sandi</label>
                            <input class="input" type="password" name="password" required>
                        </div>

                        <div class="field spaced">
                            <label class="label">Konfirmasi Kata Sandi</label>
                            <input class="input" type="password" name="password_confirmation" required>
                        </div>

                        <div class="field spaced">
                            <label class="label">No HP</label>
                            <input class="input" type="text" name="no_hp" required>
                        </div>

                        <div class="field spaced">
                            <label class="label">Tempat Lahir</label>
                            <input class="input" type="text" name="tempat_lahir" required>
                        </div>

                        <div class="field spaced">
                            <label class="label">Tanggal Lahir</label>
                            <input class="input" type="date" name="tanggal_lahir" required>
                        </div>

                        <div class="field spaced">
                            <label class="label">Jenis Kelamin</label>
                            <div class="select is-fullwidth">
                                <select name="jenis_kelamin" required>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="field spaced">
                            <label class="label">Status Perkawinan</label>
                            <input class="input" type="text" name="status_perkawinan" required>
                        </div>

                        <div class="field spaced">
                            <label class="label">Pekerjaan</label>
                            <input class="input" type="text" name="pekerjaan" required>
                        </div>

                        <div class="field spaced">
                            <label class="label">Alamat</label>
                            <textarea class="textarea" name="alamat" required></textarea>
                        </div>

                        <hr>

                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button is-primary">
                                    Register
                                </button>
                            </div>
                            <div class="control">
                                <a href="{{ route('login.form') }}" class="button">
                                    Kembali ke Login
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts below are for demo only -->
    <script type="text/javascript" src="js/main.min.js?v=1772427751095"></script>


    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '658339141622648');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1" /></noscript>

    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>

</html>