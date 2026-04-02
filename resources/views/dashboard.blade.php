<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Dashboard</h4>
                </div>
                <div class="card-body">
                    @if(session('user'))
                        <p><strong>Nama:</strong> {{ session('user')['nama'] }}</p>
                        <p><strong>Email:</strong> {{ session('user')['email'] }}</p>
                        <p><strong>Token:</strong> <small class="text-muted">{{ session('token') }}</small></p>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100 mt-3">Logout</button>
                        </form>
                    @else
                        <div class="alert alert-warning text-center">
                            Belum login. <a href="{{ route('login.form') }}">Login di sini</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>