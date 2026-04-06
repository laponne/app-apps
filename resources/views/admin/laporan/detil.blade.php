<div class="card mb-3">
    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th width="200">Nama Siswa</th>
                <td>{{ $laporan->siswa->nama }}</td>
            </tr>
            <tr>
                <th width="200">NIS</th>
                <td>{{ $laporan->siswa->nis }}</td>
            </tr>
            <tr>
                <th width="200">Kelas</th>
                <td>{{ $laporan->siswa->kelas }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $laporan->kategori->nama_kategori }}</td>
            </tr>
            <tr>
                <th>Laporan</th>
                <td>{{ $laporan->ket }}</td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>{{ $laporan->lokasi }}</td>
            </tr>
            <tr>
                <th>Status Saat Ini</th>
                <td>
                    @if ($laporan->aspirasi?->status === 'selesai')
                        <span class="badge bg-success">Selesai</span>
                    @elseif ($laporan->aspirasi?->status === 'proses')
                        <span class="badge bg-warning">Proses</span>
                    @else
                        <span class="badge bg-secondary">Belum Diproses</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Feedback Kepuasan</th>
                <td>
                    <span class="badge bg-info">
                        {{ $laporan->feedback }}
                    </span>
                </td>
            </tr>
        </table>
    </div>
</div>

{{-- Lampiran Bukti Dari Siswa --}}
@if ($laporan->attachments->count() > 0)
    <div class="card mb-3">
        <div class="card-header">
            <h6 class="mb-0">Lampiran Bukti ({{ $laporan->attachments->count() }})</h6>
        </div>
        <div class="card-body">
            <div class="row g-2">
                @foreach ($laporan->attachments as $attachment)
                    <div class="col-6 col-md-4">
                        <div class="card">
                            @if ($attachment->isImage())
                                <img src="{{ asset('storage/' . $attachment->file_path) }}" 
                                    class="card-img-top" style="height: 120px; object-fit: cover;"
                                    alt="{{ $attachment->file_name }}">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                    style="height: 120px;">
                                    <i class="bi bi-file-pdf fs-2 text-danger"></i>
                                </div>
                            @endif
                            <div class="card-body p-2">
                                <div class="text-truncate small" title="{{ $attachment->file_name }}">
                                    {{ $attachment->file_name }}
                                </div>
                                <div class="text-muted small">{{ $attachment->formatFileSize() }}</div>
                                <a href="{{ asset('storage/' . $attachment->file_path) }}" 
                                    class="btn btn-sm btn-outline-primary mt-1" target="_blank">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
