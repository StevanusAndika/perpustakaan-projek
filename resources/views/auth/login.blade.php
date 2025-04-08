<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Masuk | Web Pembayaran Ipwija</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
    <meta name="author" content="Zoyothemes"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- App css -->
    <link href="<?= asset('assets/css/app.min.css ')?>" rel="stylesheet" type="text/css" id="app-style" />
    <link href="<?= asset('assets/css/icons.min.css ')?>" rel="stylesheet" type="text/css" />

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
                                            <div class="text-center">
                                                <div class="mb-4">
                                                    <a href="index.html" class="auth-logo">
                                                        <img src="{{asset('assets/logo.ico') }}" alt="logo-dark" class="mx-auto" height="56" width="auto" />
                                                    </a>
                                                </div>
                                                <div class="auth-title-section mb-3">
                                                    <h3 class="text-dark fs-20 fw-medium mb-2">Selamat Datang di Perpustakaan IPWIJA</h3>
                                                    <p class="text-dark text-capitalize fs-14 mb-0">Silahkan Masuk untuk mengakses fitur</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-0">
                                            <form id="loginForm" method="POST" action="{{ route('login_submit') }}">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="emailaddress" class="form-label">Email address</label>
                                                    <input class="form-control" type="text" id="email" name="email" required="" placeholder="Masukkan username atau email anda">
                                                </div>
                                                <div class="form-group mb-3 position-relative">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input class="form-control" type="password" required="" autocomplete="off" id="password" name="password" placeholder="Masukkan password anda...">
                                                    <span id="toggle-password" class="position-absolute top-50 end-0 translate-middle-y pe-2" style="cursor: pointer;">
                                                        <i data-feather="eye" id="eye-icon"></i>
                                                    </span>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6 col-8">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                                                <label class="form-check-label" for="checkbox-signin">Ingat login</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-6 text-end">
                                                            <a href="{{ route('forgot_password') }}" class="me-2">Lupa password</a> /
                                                            <a href="{{ route('register') }}" class="text-primary">Register</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary" type="submit" name="submit"> Log In </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Google Login Button --}}
                                                <div class="form-group text-center mt-2">
                                                    <a href="{{ route('auth.google') }}" class="btn btn-outline-dark d-flex align-items-center justify-content-center">
                                                        <img src="https://www.google.com/favicon.ico" alt="Google Icon" class="me-2" style="width:20px; height:20px;">
                                                        <span>Login dengan Google</span>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6 col-lg-6 p-0 vh-100 d-none d-md-flex justify-content-center account-page-bg"
                            style="background-image: url('https://img.freepik.com/premium-vector/student-library-smart-pupil-glasses-with-book-near-bookshelf_276875-416.jpg?w=740');">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor -->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

    <!-- Show/Hide Password Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            feather.replace();

            const togglePassword = document.getElementById("toggle-password");
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eye-icon");

            togglePassword.addEventListener("click", function () {
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);

                eyeIcon.setAttribute("data-feather", type === "password" ? "eye" : "eye-off");
                feather.replace(); // Re-render icon
            });
        });
    </script>

    <!-- SweetAlert for Sessions -->
    <script>
        @if(session('status'))
        Swal.fire({
            icon: 'success',
            title: 'Password Berhasil Direset',
            text: 'Silahkan Login untuk mengakses fitur',
            imageHeight: 90,
            showCancelButton: true,
            confirmButtonText: 'Ok',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('login') }}";
            }
        });
        @endif

        @if(session('login_required'))
        Swal.fire({
            icon: 'warning',
            title: 'Akses Ditolak',
            text: "{{ session('login_required') }}",
            showConfirmButton: true,
            confirmButtonText: 'Ok',
            timerProgressBar: true,
            timer: 3000,
        }).then(() => {
            fetch('/clear-login-required-session', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            });
        });
        @endif

        @if(session('login_error'))
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: "{{ session('login_error') }}",
            showConfirmButton: true
        });
        @endif
    </script>
</body>
</html>
