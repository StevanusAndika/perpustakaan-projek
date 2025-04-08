@extends('layouts.app')

@section('title', 'Profile - Payment IPWIJA')

@section('content')
@include('profiles.modal')
<div class="container-xxl">
    <div class="flex-grow-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <h4 class="fs-18 fw-semibold m-0">Profile</h4>
    </div>
    <div class="profile-info mt-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/images/users/user-12.jpg') }}" alt="Profile Picture" class="rounded-circle" width="100">
                    <div class="ms-3">
                        <h5 class="card-title">Nama User: <strong>{{ Auth::user()->name }}</strong></h5>
                        @if(Auth::user()->role != 'admin')
                            <p class="card-text"><strong>NIM:</strong> {{ Auth::user()->nim }}</p>
                        @endif

                        <p class="card-text"><strong>Nomor Anggota:</strong> {{ Auth::user()->no_anggota }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p class="card-text"><strong>No Telepon:</strong> {{ Auth::user()->no_telepon }}</p>

                        <p class="card-text"><strong>Alamat:</strong> {{ Auth::user()->alamat }}</p>
                        <p class="card-text"><strong>Role:</strong>
                            @if(Auth::user()->role == 'user')
                               Mahasiswa
                            @elseif(Auth::user()->role == 'admin')
                                Admin
                            @endif
                        </p>
                        <p class="card-text"><strong>Status:</strong>
                            @if(Auth::user()->status == 1)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                        </p>

                        <!-- Tombol Edit -->
                        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            Edit Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@if (session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#28a745'
    });
</script>
@endif


@endsection
