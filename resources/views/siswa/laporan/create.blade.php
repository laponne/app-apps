@extends('layouts.siswa')
@section('title', 'Buat Laporan Pengaduan')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h5 class="card-title">
            Buat Laporan Pengaduan
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('siswa.laporan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- Kategori --}}
                    <x-select label="Kategori" name="kategori_id"
                        :options="$kategori" labelField="nama_kategori" />
                    {{-- Lokasi --}}
                    <x-input label="Lokasi Kejadian" name="lokasi"
                        placeholder="Contoh: Ruang Kelas X PPLG 1" />
                    {{-- Keterangan --}}
                    <x-textarea label="Keterangan" name="ket"
                        placeholder="Masukkan keterangan..." rows="5" />
                    {{-- Lampiran Bukti --}}
                    <div class="mb-3">
                        <label class="form-label">Lampiran Bukti <span class="text-muted">(Opsional)</span></label>
                        <input type="file" class="form-control @error('attachments.*') is-invalid @enderror" 
                            name="attachments[]" multiple accept=".jpg,.jpeg,.png,.pdf">
                        <div class="form-text">
                            Format: JPG, JPEG, PNG, PDF | Maks 5MB per file | Bisa upload 1+ file
                        </div>
                        @error('attachments.*')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary">
                            <i class="bi bi-send"></i>
                            Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
