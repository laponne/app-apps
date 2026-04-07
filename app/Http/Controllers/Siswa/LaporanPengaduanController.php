<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Aspirasi;
use App\Models\Attachment;
use App\Models\Kategori;
use App\Models\LaporanPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanPengaduanController
{
    public function create()
    {
        $kategori = Kategori::all();
        return view('siswa.laporan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'ket' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'attachments.*' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120' // max 5MB
        ]);

        $laporan = LaporanPengaduan::create([
            'siswa_id' => Auth::guard('siswa')->user()->id,
            'kategori_id' => $request->kategori_id,
            'ket' => $request->ket,
            'lokasi' => $request->lokasi,
        ]);

        // Simpan lampiran jika ada
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $this->storeAttachment($file, $laporan, 'laporan');
            }
        }

        return redirect()
            ->route('siswa.dashboard')
            ->with('success', 'Laporan berhasil dikirim');
    }

    public function show(LaporanPengaduan $laporan)
    {
        $laporan->load(['siswa', 'aspirasi', 'kategori']);
        return view('siswa.laporan.show', [
            'laporan' => $laporan
        ]);
    }

    public function destroy(LaporanPengaduan $laporan)
    {
        $laporan->delete();
        return redirect()
            ->route('siswa.dashboard')
            ->with('success', 'Laporan berhasil dihapus');
    }

    public function feedback(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'feedback' => 'required|integer|min:1|max:5',
            'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120', // max 5MB
        ]);

        // Simpan feedback ke aspirasi
        $aspirasi->update([
            'feedback' => $request->feedback,
        ]);

        // Simpan file bukti ke tabel attachments dengan type 'feedback'
        $laporan = $aspirasi->laporan;
        if ($request->hasFile('bukti') && $laporan) {
            $this->storeAttachment($request->file('bukti'), $laporan, 'feedback');
        }

        return redirect()
            ->route('siswa.dashboard')
            ->with('success', 'Terima kasih atas feedback Anda.');
    }

    /**
     * Simpan attachment file
     */
    private function storeAttachment($file, LaporanPengaduan $laporan, $type = 'laporan')
    {
        $path = 'laporan-bukti/' . date('Y/m/d');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs($path, $filename, 'public');
        Attachment::create([
            'laporan_pengaduan_id' => $laporan->id,
            'file_name' => $filename,
            'file_path' => $path . '/' . $filename,
            'file_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
            'type' => $type,
        ]);
    }

    /**
     * Delete attachment
     */
    public function deleteAttachment(Attachment $attachment)
    {
        Storage::disk('public')->delete($attachment->file_path);
        $attachment->delete();

        return redirect()->back()->with('success', 'Lampiran berhasil dihapus');
    }
}
