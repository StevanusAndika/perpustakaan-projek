<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Masuk | Web Pembayaran Ipwija</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme."/>
    <meta name="author" content="Zoyothemes"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-color">
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-12">
                <div class="p-0">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6 col-xl-6 col-lg-6 mx-auto">
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="mb-0 border-0">
                                        <div class="p-0">
                                            <div class="text-center mb-4">
                                                <a href="index.html" class="auth-logo">
                                                    <img src="{{ asset('assets/logo.ico') }}" alt="logo-dark" class="mx-auto" height="56" />
                                                </a>
                                            </div>
                                            <div class="auth-title-section mb-3 text-center">
                                                <h3 class="text-dark fs-20 fw-medium mb-2">Selamat Datang di Perpustakaan IPWIJA</h3>
                                                <p class="text-dark fs-14 mb-0">Silahkan Registrasi untuk mengakses fitur</p>
                                            </div>
                                        </div>

                                        <div class="pt-0">
                                            <form id="registerForm" method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="name" class="form-label">Nama Mahasiswa</label>
                                                    <input class="form-control" type="text" id="name" name="name" required placeholder="Masukkan Nama Mahasiswa">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input class="form-control" type="email" id="email" name="email" required placeholder="Masukkan email">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="nim" class="form-label">NIM</label>
                                                    <input class="form-control" type="text" id="nim" name="nim" required placeholder="Masukkan NIM Mahasiswa">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input class="form-control" type="text" id="alamat" name="alamat" required placeholder="Masukkan Alamat Mahasiswa">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="no_telepon" class="form-label">No WhatsApp</label>
                                                    <input class="form-control" type="text" id="no_telepon" name="no_telepon" required placeholder="Masukkan No WhatsApp Mahasiswa">
                                                </div>

                                                <!-- Password with eye toggle -->
                                                <div class="form-group mb-3 position-relative">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input class="form-control pr-5" type="password" id="password" name="password" required placeholder="Masukkan password">
                                                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" id="toggle-password" style="cursor: pointer;">
                                                        <i data-feather="eye" id="eye-icon-password"></i>
                                                    </span>
                                                </div>

                                                <!-- Confirm Password with eye toggle -->
                                                <div class="form-group mb-3 position-relative">
                                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                                    <input class="form-control pr-5" type="password" id="password_confirmation" name="password_confirmation" required placeholder="Konfirmasi password">
                                                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" id="toggle-password-confirm" style="cursor: pointer;">
                                                        <i data-feather="eye" id="eye-icon-confirm"></i>
                                                    </span>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <button type="submit" class="btn btn-primary w-100">Registrasi</button>
                                                </div>

                                                <div class="form-group text-center mt-2">
                                                    <a href="{{ route('auth.google') }}" class="btn btn-outline-dark d-flex align-items-center justify-content-center">
                                                        <img src="https://www.google.com/favicon.ico" alt="Google Icon" class="me-2" style="width:20px; height:20px;">
                                                        <span>Daftar/Login dengan Google</span>
                                                    </a>
                                                </div>

                                                <div class="form-group text-center mt-3">
                                                    <p class="mb-0">
                                                        Sudah punya akun?
                                                        <a href="{{ route('login') }}" class="text-primary fw-medium">Login di sini</a> |
                                                        <a href="{{ route('forgot_password') }}" class="text-danger fw-medium">Reset Password</a>
                                                    </p>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Background Image -->
                        <div class="col-md-6 col-xl-6 col-lg-6 p-0 vh-100 d-none d-md-flex justify-content-center account-page-bg"
                            style="background-image: url('https://img.freepik.com/free-vector/public-library-visitors-scientific-research-self-study-educational-center-people-looking-books-library-shelves-reading-textbooks-vector-isolated-concept-metaphor-illustration_335657-1339.jpg?w=740');">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor Scripts -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Show/Hide Password -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            feather.replace();

            function setupToggle(toggleId, inputId, iconId) {
                const toggle = document.getElementById(toggleId);
                const input = document.getElementById(inputId);
                const icon = document.getElementById(iconId);

                toggle.addEventListener("click", function () {
                    const type = input.getAttribute("type") === "password" ? "text" : "password";
                    input.setAttribute("type", type);
                    icon.setAttribute("data-feather", type === "password" ? "eye" : "eye-off");
                    feather.replace();
                });
            }

            setupToggle("toggle-password", "password", "eye-icon-password");
            setupToggle("toggle-password-confirm", "password_confirmation", "eye-icon-confirm");
        });
    </script>

    <!-- SweetAlert for Session Flash -->
    <script>
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
        });
        @endif

        @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Validasi Gagal!',
            html: '{!! implode("<br>", $errors->all()) !!}'
        });
        @endif
    </script>
</body>
</html>
