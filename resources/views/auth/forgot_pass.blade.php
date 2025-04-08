<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /> 
    <title>Reset Password | Web Pembayaran Ipwija</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
    <meta name="author" content="Zoyothemes"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="https://cdn.jsdelivr.net/npm/feather-icons@0.1.0/css/feather.min.css" rel="stylesheet">
    
    <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo.ico') }}"/>
    <link rel="shortcut icon" href="<?= asset('css/app.min.css ')?>">
    <!-- App css -->
    <link href="<?= asset('assets/css/app.min.css ')?>" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons -->
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
                                                    @if ($errors->any())
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            Swal.fire({
                                                                icon: 'error',
                                                                title: 'Gagal Reset Password !',
                                                                text: '@foreach ($errors->all() as $error) {{ $error }} @endforeach',
                                                                confirmButtonText: 'OK'
                                                            });
                                                        });
                                                    </script>
                                                    @endif
                                                    <h3 class="text-dark fs-20 fw-medium mb-2">Selamat Datang di Pembayaran Ipwija</h3>
                                                    <p class="text-dark text-capitalize fs-14 mb-0">Silahkan Reset  Password Anda Disini</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-0">
                                            <form id="resetForm" method="POST" action="{{ route('forgot_password') }}">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="emailaddress" class="form-label">Email address</label>
                                                    <input class="form-control" type="text" id="email" name="email" required="" placeholder="Masukkan username atau email anda">
                                                </div>
                                                <div class="form-group mb-3 position-relative">
                                                  <label for="password" class="form-label">Password</label>
                                                  <input class="form-control" type="password" required="" autocomplete="off" id="password" name="password" width="50px"placeholder="Masukkan password baru anda...">
                                                  <span id="toggle-password" class="position-absolute top-50 end-0 translate-middle-y pe-2" style="cursor: pointer;">
                                                      <i class="feather-icon mt-4" data-feather="eye"></i>
                                                  </span>
                                              </div>
                                              <div class="text-end mb-3 mr-3">
                                                <a href="{{ route('login') }}">Halaman login</a>
                                              </div>
                                              
                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary" type="button" onclick="confirmReset()">Reset Password</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6 col-lg-6 p-0 vh-100 d-none d-md-flex justify-content-center account-page-bg" style="background-image: url('https://img.freepik.com/premium-vector/forgot-password-username-concept-with-confused-businessman-forgot-password-illustration_675567-3024.jpg?w=996');">
                            <!-- Konten latar belakang opsional untuk tampilan desktop -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/login_page.js')}}"></script>
    
    <script>
        function confirmReset() {
            Swal.fire({
                title: 'Konfirmasi Reset Password',
                text: "Apakah anda yakin ingin mereset password?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Iya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('resetForm').submit();
                }
            });
        }

    </script>
    @section('cutom-style')
    <style>
      .login-link {
          display: inline-block;
          margin-top: 10px; /* Sesuaikan dengan jarak yang diinginkan */
      }
  </style>
  
    @endsection
</body>
</html>
