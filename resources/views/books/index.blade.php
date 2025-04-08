@extends('layouts.app')

@section('title', 'Profile - Payment IPWIJA')

@section('content')
@include('profiles.modal')
<div class="container-xxl">
    <div class="flex-grow-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <h4 class="fs-18 fw-semibold m-0">Koleksi Buku Perpustakaan IPWIJA</h4>
    </div>
    
</div>



@if(session('success'))
<script>
    Notiflix.Notify.success('{{ session('success') }}');
</script>
@endif

@endsection
