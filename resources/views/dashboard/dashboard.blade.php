@extends('layouts.app')

@section('title', 'Dashboard - Perpustakaan')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Admin Dashboard -->
        @if(auth()->user()->role == 'user')
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="card hover-card">
                    <a href="{{ route('books.index') }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-book font-size-24 text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Koleksi Buku</h5>
                                    <p class="text-muted mb-0">Lihat Koleksi </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="card hover-card">
                    <a href="{{ route('books.index') }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-book-open-variant font-size-24 text-danger"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Buku Yang Dipinjam</h5>
                                    <p class="text-muted mb-0">Lihat Data</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="card hover-card">
                    <a href="{{ route('books.index') }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-swap-horizontal font-size-24 text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Buku Yang Dikembalikan</h5>
                                    <p class="text-muted mb-0">Lihat Data</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="card hover-card">
                    <a href="{{ route('profile.index') }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-account-multiple-outline font-size-24 text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Profil Pengguna</h5>
                                    <p class="text-muted mb-0">Kelola Data Kamu</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @else
        <!-- Regular User Dashboard -->
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="card hover-card">
                    <a href="{{ route('admin.category.index') }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-format-list-bulleted font-size-24 text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Daftar Kategori</h5>
                                    <p class="text-muted mb-0">Lihat Kategori</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="card hover-card">
                    <a href="{{ route('books.index') }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-currency-usd font-size-24 text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Pembayaran</h5>
                                    <p class="text-muted mb-0">Lihat Pembayaran</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="card hover-card">
                    <a href="{{ route('books.index') }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-account-outline font-size-24 text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Profil</h5>
                                    <p class="text-muted mb-0">Lihat Profil</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    .container-fluid {
        padding-top: 20px;
    }
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }
    .card-body {
        cursor: pointer;
    }
    .card-body .text-decoration-none {
        display: block;
    }
</style>
@endpush