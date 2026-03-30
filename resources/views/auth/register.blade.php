<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureBank Register</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none">
                        <rect width="36" height="36" rx="8" fill="#6366F1"/>
                        <path d="M12 14h12v8H12v-8zm2 2v4h8v-4h-8zm-2-4h12v2H12v-2zm0 12h12v2H12v-2z" fill="white"/>
                    </svg>
                </div>
                <h1>SecureBank</h1>
                <p>Create your account securely</p>
            </div>
            
            <form class="login-form" method="POST" action="{{ route('register.post') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required autocomplete="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required autocomplete="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" required autocomplete="new-password">
                        <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <!-- icon mata sama seperti login -->
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" id="no_hp" name="no_hp" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" required>
                </div>

                <button type="submit" class="login-btn">
                    <span class="btn-text">Register</span>
                    <div class="btn-loader">
                        <div class="spinner"></div>
                    </div>
                </button>
            </form>

            <div class="security-notice">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M8 1L3 3v4.5c0 2.89 2 5.5 5 6 3-0.5 5-3.11 5-6V3l-5-2z" stroke="#10B981" stroke-width="1.5" fill="none"/>
                    <path d="M6 8l1.5 1.5L11 6" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Your connection is secured with 256-bit SSL encryption</span>
            </div>
        </div>
    </div>

    <script src="../../shared/js/form-utils.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>