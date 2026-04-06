<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aspirasi;
use App\Models\LaporanPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanAspirasiController
{
    public function index(Request $request)
    {
        $query = LaporanPengaduan::with(['kategori', 'aspirasi'])
            ->latest();

        if ($request->filled('status')) {
            if ($request->status === 'belum') {
                $query->where(function ($q) {
                    $q->whereDoesntHave('aspirasi')
                        ->orWhereHas('aspirasi', function ($sub) {
                            $sub->where('status', 'menunggu');
                        });
                });
            } else {
                $query->whereHas('aspirasi', function ($q) use ($request) {
                    $q->where('status', $request->status);
                });
            }
        }

        $laporan = $query->paginate(10)->withQueryString();

        $kepuasan = [
            1 => 'Tidak Puas',
            2 => 'Kurang Puas',
            3 => 'Cukup Puas',
            4 => 'Puas',
            5 => 'Sangat Puas',
        ];

        $laporan->getCollection()->transform(function ($item) use ($kepuasan) {
            $item->status = $item->aspirasi?->status;
            $nilai = $item->aspirasi?->feedback ?? null;
            $item->feedback = $nilai
                ? $kepuasan[$nilai] ?? '-'
                : 'Belum ada feedback';
            return $item;
        });

        return view('admin.laporan.index', compact('laporan'));
    }

    public function show(LaporanPengaduan $laporan)
    {
        $laporan->load(['siswa', 'kategori', 'aspirasi', 'attachments']);

        $kepuasan = [
            1 => 'Tidak Puas',
            2 => 'Kurang Puas',
            3 => 'Cukup Puas',
            4 => 'Puas',
            5 => 'Sangat Puas',
        ];

        if ($laporan->aspirasi?->feedback) {
            $laporan->feedback = $kepuasan[$laporan->aspirasi->feedback] ?? '-';
        } else {
            $laporan->feedback = 'Belum ada feedback';
        }

        return view('admin.laporan.show', compact('laporan'));
    }

    public function update(Request $request, LaporanPengaduan $laporan)
    {
        $request->validate([
            'status' => 'required|in:proses,selesai',
        ]);

        Aspirasi::updateOrCreate(
            [
                'laporan_id' => $laporan->id,
            ],
            [
                'admin_id' => Auth::guard('admin')->id(),
                'status' => $request->status,
            ]
        );

        return redirect()
            ->route('admin.laporan.show', $laporan->id)
            ->with('success', 'Status aspirasi berhasil diperbarui');
    }
}
