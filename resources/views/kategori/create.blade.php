@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4 text-primary fw-bold">Tambah Kategori</h3>

    <form action="{{ route('kategori.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf

        <div class="form-group mb-3">
            <label for="nama_kategori" class="fw-semibold">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori"
                   class="form-control border-primary @error('nama_kategori') is-invalid @enderror"
                   value="{{ old('nama_kategori') }}" required>
            @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="keterangan" class="fw-semibold">Keterangan</label>
            <textarea name="keterangan" id="keterangan"
                      class="form-control border-primary @error('keterangan') is-invalid @enderror"
                      rows="3">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('kategori.index') }}" class="btn btn-outline-danger px-4">
                ❌ Batal
            </a>
            <button type="submit" class="btn btn-primary px-4">
                💾 Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection
