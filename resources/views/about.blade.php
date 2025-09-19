@extends('layouts.app')

@section('content')
<h2>About</h2>
<div class="d-flex align-items-center">
    <img src="{{ asset('images/meifa.jpg') }}" alt="Foto Anda"
        class="me-4"
        style="width: 150px; height: 150px; object-fit: cover; object-position: center 20%; border: 3px solid #ddd; border-radius: 8px;">
    <div>
        <p>Aplikasi ini dibuat oleh:</p>
        <p><strong>Nama:</strong> Meifa Ratna Duhita</p>
        <p><strong>Prodi:</strong> D3-MI PSDKU Kediri</p>
        <p><strong>NIM:</strong> 2331730092</p>
        <p><strong>Tanggal:</strong> 16 September 2025</p>
    </div>
</div>
@endsection
