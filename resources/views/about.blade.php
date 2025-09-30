@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-primary fw-bold">Tentang Aplikasi</h2>
<div class="d-flex align-items-center bg-light p-3 rounded shadow-sm">
    <img src="{{ asset('images/andina.jpeg') }}" alt="Foto Anda"
        class="me-4"
        style="width: 150px; height: 150px; object-fit: cover; object-position: center 20%; 
               border: 4px solid #2563eb; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
    <div>
        <p class="mb-1 text-secondary">Aplikasi ini dibuat oleh:</p>
        <p><strong>👩 Nama      :</strong> <span class="text-dark">Andina Septiana Putri</span></p>
        <p><strong>🎓 Prodi     :</strong> <span class="text-dark">D3-MI PSDKU Kediri</span></p>
        <p><strong>🆔 NIM       :</strong> <span class="text-dark">2331730031</span></p>
        <p><strong>📅 Tanggal   :</strong> <span class="text-dark">26 September 2025</span></p>
    </div>  
</div>
@endsection
