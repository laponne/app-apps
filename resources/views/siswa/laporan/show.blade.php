@extends('layouts.siswa')
@section('title', 'Laporan Pengaduan')
@section('content')
<div class="card mt-3">
    <div class="card-header">
        <h5 class="card-title mb-0">
            Laporan Pengaduan
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                {{-- Kategori --}}
                <div class="mb-4">
                    <div class="text-muted small">Kategori</div>
                    <div class="fw-semibold">
                        {{ $laporan->kategori->nama_kategori ?? '-' }}
                    </div>
                </div>
                {{-- Lokasi --}}
                <div class="mb-4">
                    <div class="text-muted small">Lokasi Kejadian</div>
                    <div class="fw-semibold">
                        {{ $laporan->lokasi }}
                    </div>
                </div>
                {{-- Keterangan --}}
                <div class="mb-4">
                    <div class="text-muted small">Keterangan</div>
                    <div>
                        {{ $laporan->ket }}
                    </div>
                </div>
                {{-- Lampiran Bukti Laporan --}}
                @php
                    $lampiranLaporan = $laporan->attachments->where('type', 'laporan');
                    $lampiranFeedback = $laporan->attachments->where('type', 'feedback');
                @endphp
                @if ($lampiranLaporan->count() > 0)
                    <div class="mb-4">
                        <div class="text-muted small">Lampiran Bukti Laporan</div>
                        <div class="row g-2 mt-2">
                            @foreach ($lampiranLaporan as $attachment)
                                <div class="col-6 col-md-4">
                                    <div class="card">
                                        @if ($attachment->isImage())
                                            <img src="{{ asset('storage/' . $attachment->file_path) }}" 
                                                class="card-img-top" style="height: 150px; object-fit: cover;" 
                                                alt="{{ $attachment->file_name }}">
                                        @else
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                                style="height: 150px;">
                                                <i class="bi bi-file-pdf fs-1 text-danger"></i>
                                            </div>
                                        @endif
                                        <div class="card-body p-2">
                                            <div class="text-truncate small" title="{{ $attachment->file_name }}">
                                                {{ $attachment->file_name }}
                                            </div>
                                            <div class="text-muted small">{{ $attachment->formatFileSize() }}</div>
                                            <div class="mt-2">
                                                <a href="{{ asset('storage/' . $attachment->file_path) }}" 
                                                    class="btn btn-sm btn-outline-primary" target="_blank">
                                                    <i class="bi bi-download"></i> Download
                                                </a>
                                                <form action="{{ route('siswa.attachment.delete', $attachment) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                        onclick="return confirm('Hapus lampiran ini?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Lampiran Bukti Feedback --}}
                @if ($lampiranFeedback->count() > 0)
                    <div class="mb-4">
                        <div class="text-muted small">Lampiran Bukti Selesai</div>
                        <div class="row g-2 mt-2">
                            @foreach ($lampiranFeedback as $attachment)
                                <div class="col-6 col-md-4">
                                    <div class="card">
                                        @if ($attachment->isImage())
                                            <img src="{{ asset('storage/' . $attachment->file_path) }}" 
                                                class="card-img-top" style="height: 150px; object-fit: cover;" 
                                                alt="{{ $attachment->file_name }}">
                                        @else
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                                style="height: 150px;">
                                                <i class="bi bi-file-pdf fs-1 text-danger"></i>
                                            </div>
                                        @endif
                                        <div class="card-body p-2">
                                            <div class="text-truncate small" title="{{ $attachment->file_name }}">
                                                {{ $attachment->file_name }}
                                            </div>
                                            <div class="text-muted small">{{ $attachment->formatFileSize() }}</div>
                                            <div class="mt-2">
                                                <a href="{{ asset('storage/' . $attachment->file_path) }}" 
                                                    class="btn btn-sm btn-outline-primary" target="_blank">
                                                    <i class="bi bi-download"></i> Download
                                                </a>
                                                <form action="{{ route('siswa.attachment.delete', $attachment) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                        onclick="return confirm('Hapus lampiran ini?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                {{-- Tanggapan Admin --}}
                @include('siswa.laporan.tanggapan')
                {{-- Feedback --}}
                @if ($laporan->aspirasi?->status === 'selesai')
                    @include('siswa.laporan.feedback')
                @endif
                <a href="{{ route('siswa.dashboard') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
