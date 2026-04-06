# Dokumentasi: Fitur Upload Lampiran untuk Bukti Pengaduan

## 📋 Fitur yang Diimplementasikan

### Upload Lampiran (Bukti Pengaduan)
- Siswa dapat upload 1+ file sebagai bukti pengaduan
- File types yang didukung: **JPG, JPEG, PNG, PDF**
- Maksimal ukuran file: **5MB per file**
- File disimpan dengan struktur folder: `storage/app/public/laporan-bukti/{tahun}/{bulan}/{hari}/`

### Preview & Download
- **Gambar**: Tampilkan preview thumbnail otomatis
- **PDF**: Tampilkan icon PDF dengan link view/download
- **Ukuran file**: Format readable (B, KB, MB, GB)
- **Delete**: User bisa hapus lampiran jika diperlukan

### Tampilan Admin
- Admin bisa melihat semua lampiran dari siswa di halaman detail laporan
- Preview thumbnail untuk gambar
- Link untuk view/download attachment

---

## 📁 File yang Dibuat/Diubah

### Database
- ✅ `database/migrations/2026_04_07_000001_create_attachments_table.php`
  - Tabel `attachments` dengan kolom: id, laporan_pengaduan_id, file_name, file_path, file_type, file_size, timestamps

### Models
- ✅ `app/Models/Attachment.php` (BARU)
  - Relasi dengan LaporanPengaduan
  - Helper: `isImage()`, `formatFileSize()`

- ✅ `app/Models/LaporanPengaduan.php` (UPDATED)
  - Tambah relasi `attachments()` hasMany

### Controllers
- ✅ `app/Http/Controllers/Siswa/LaporanPengaduanController.php` (UPDATED)
  - Update `store()` - handle file upload
  - Update `show()` - eager load attachments
  - Tambah method `storeAttachment()`
  - Tambah method `deleteAttachment()`

- ✅ `app/Http/Controllers/Admin/LaporanAspirasiController.php` (UPDATED)
  - Update `show()` - eager load attachments

### Routes
- ✅ `routes/web.php` (UPDATED)
  - Tambah: `Route::delete('/attachment/{attachment}', ...)->name('attachment.delete')`

### Views
- ✅ `resources/views/siswa/laporan/create.blade.php` (UPDATED)
  - Tambah form input file dengan `enctype="multipart/form-data"`
  - Input dengan atribut: `multiple`, `accept=".jpg,.jpeg,.png,.pdf"`

- ✅ `resources/views/siswa/laporan/show.blade.php` (UPDATED)
  - Tambah section "Lampiran Bukti"
  - Display card untuk setiap file (image thumbnail atau PDF icon)
  - Button: Download & Delete untuk setiap lampiran

- ✅ `resources/views/admin/laporan/detil.blade.php` (UPDATED)
  - Tambah section "Lampiran Bukti" 
  - Display semua attachment dari siswa
  - Button view/download untuk admin

---

## 🚀 Setup & Running

### 1. Run Migration
```bash
php artisan migrate
```

### 2. Setup Storage Symlink (jika belum)
```bash
php artisan storage:link
```

### 3. Clear Cache
```bash
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### 4. Jalankan Aplikasi
```bash
php artisan serve
```

---

## 📸 Cara Menggunakan

### Untuk Siswa:
1. Login sebagai siswa
2. Navigasi ke "Buat Laporan Pengaduan"
3. Isi form: Kategori, Lokasi, Keterangan
4. **Lampiran Bukti**: Klik input file dan pilih 1+ file
   - Format: JPG, JPEG, PNG, PDF
   - Maksimal 5MB per file
5. Klik "Kirim Laporan"
6. File akan otomatis tersimpan dan dikirim

### Melihat Laporan dengan Lampiran (Siswa):
1. Buka detail laporan dari dashboard
2. Scroll down ke section "Lampiran Bukti"
3. Lihat preview/icon file
4. Klik "Download" untuk download file
5. Klik icon trash untuk hapus lampiran

### Untuk Admin:
1. Login sebagai admin
2. Buka menu "Laporan & Aspirasi"
3. Klik detail salah satu laporan
4. Scroll ke section "Lampiran Bukti dari Siswa"
5. Lihat semua evidence yang di-upload siswa
6. Klik "Lihat" untuk preview/download

---

## 📊 Database Schema

### Table: attachments
```sql
- id (bigint, primary key)
- laporan_pengaduan_id (bigint, foreign key → laporan_pengaduans.id)
- file_name (string) - nama file asli
- file_path (string) - path relatif: laporan-bukti/2026/04/07/timestamp_filename.ext
- file_type (string) - MIME type (image/jpeg, application/pdf, dst)
- file_size (bigint) - ukuran dalam bytes
- created_at (timestamp)
- updated_at (timestamp)
```

### Relationships
**LaporanPengaduan** hasMany **Attachment**
```php
$laporan->attachments() // Dapatkan semua attachment
$laporan->attachments()->count() // Jumlah attachment
```

**Attachment** belongsTo **LaporanPengaduan**
```php
$attachment->laporan() // Dapatkan laporan terkait
```

---

## 🛡️ Validasi

### File Validation
- MIME types: `jpg, jpeg, png, pdf`
- Maksimal size: 5MB per file
- Divalidasi di server & client side

### Route Authorization
- Hanya authenticated siswa yang bisa upload
- Hanya bisa delete attachment milik sendiri (model binding)
- Admin bisa view semua attachment

---

## 📝 Helper Methods

### Attachment Model:
```php
// Cek jika file adalah gambar
$attachment->isImage()

// Format ukuran file
$attachment->formatFileSize() // "2.5 MB"
```

---

## 💾 File Storage

### Path Organization:
```
storage/app/public/
  └── laporan-bukti/
      └── 2026/
          └── 04/
              └── 07/
                  ├── 1712500123_photo.jpg
                  ├── 1712500124_document.pdf
                  └── ...
```

### Accessible URL:
```
http://localhost:8000/storage/laporan-bukti/2026/04/07/1712500123_photo.jpg
```

---

## 🔧 Troubleshooting

### File tidak bisa diupload
1. Check storage permissions: `chmod -R 755 storage`
2. Ensure symlink: `php artisan storage:link`
3. Check disk config di `config/filesystems.php`

### Lammbatan upload besar
1. Check `php.ini`: `upload_max_filesize`, `post_max_size`
2. Kurangi max file size di validation

### File hilang setelah delete
1. Normal behavior - file & database record terhapus
2. Storage symlink perlu valid

---

## 📚 Additional Features yang Bisa Ditambah

1. **Kompresi Gambar** - Kompres otomatis saat upload
2. **Virus Scanning** - Scan file sebelum disimpan
3. **File Preview Modal** - Lightbox preview di browser
4. **Batch Upload** - Drag & drop upload
5. **File Storage Limit** - Limit total storage per siswa
6. **Audit Log** - Track siapa upload/delete kapan
7. **Comments on Attachment** - Admin bisa comment per file

---

## ✅ Status Implementasi

- ✅ Database migration & model
- ✅ Controller upload & delete logic
- ✅ View form upload
- ✅ View display attachment
- ✅ Admin view attachment
- ✅ Routes
- ✅ Validation
- ✅ Storage symlink setup
- ✅ Error handling

**Ready untuk production! 🎉**
