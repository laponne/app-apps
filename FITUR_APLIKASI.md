# 📋 DAFTAR FITUR APLIKASI APSS

**Aplikasi Pengaduan Sarana Sekolah (APSS)**  
*School Facility Complaint Application - Laravel 12 & Bootstrap 5*

---

## 🎯 RINGKASAN APLIKASI

Sistem manajemen pengaduan sarana dan aspirasi sekolah dengan 2 peran pengguna:
- **Siswa**: Membuat laporan pengaduan dan memberikan feedback
- **Admin**: Mengelola kategori, memproses laporan, dan memberikan tanggapan

---

## 👥 MODUL 1: AUTENTIKASI & AKUN

### A. SISWA - Autentikasi
| Fitur | Deskripsi | Route |
|-------|-----------|--------|
| **1.1 Login Siswa** | Login dengan NIS (tanpa password) | `GET/POST siswa/login` |
| **1.2 Register Siswa** | Pendaftaran dengan NIS, Nama, Kelas | `GET/POST siswa/register` |
| **1.3 Logout Siswa** | Keluar dari sistem | `POST siswa/logout` |

**Form Login Siswa:**
- Input: NIS (wajib)
- Fitur: Auto-login tanpa password, redirect ke dashboard

**Form Register Siswa:**
- Input: NIS (unik, 10 digit), Nama Lengkap, Kelas
- Validasi: NIS tidak boleh duplikat
- Fitur: Auto-login setelah registrasi berhasil

---

### B. SISWA - Profil Akun
| Fitur | Deskripsi | Route |
|-------|-----------|--------|
| **1.4 Lihat Profil Siswa** | Tampilkan data profil siswa | `GET siswa/akun/edit` |
| **1.5 Edit Profil Siswa** | Update data NIS, Nama, Kelas | `PUT siswa/akun` |

**Data yang dapat diedit:**
- NIS (validasi unik, tidak boleh sama dengan siswa lain)
- Nama Lengkap
- Kelas

---

### C. ADMIN - Autentikasi
| Fitur | Deskripsi | Route |
|-------|-----------|--------|
| **1.6 Login Admin** | Login dengan Username & Password | `GET/POST admin/login` |
| **1.7 Logout Admin** | Keluar dari sistem | `POST admin/logout` |

**Form Login Admin:**
- Input: Username, Password
- Fitur: Session-based authentication dengan password hashing
- Default: username `admin`, password `password`

---

### D. ADMIN - Profil Akun
| Fitur | Deskripsi | Route |
|-------|-----------|--------|
| **1.8 Lihat Akun Admin** | Tampilkan data profil admin | `GET admin/akun` |
| **1.9 Update Profil Admin** | Edit Nama dan Username | `POST admin/akun` |
| **1.10 Update Password Admin** | Ubah password dengan verifikasi old password | `POST admin/akun/password` |

**Data yang dapat diedit:**
- Nama Admin
- Username
- Password (dengan verifikasi password lama terlebih dahulu)

---

## 📝 MODUL 2: LAPORAN PENGADUAN (SISWA)

| Fitur | Deskripsi | Route |
|-------|-----------|--------|
| **2.1 Lihat Dashboard Laporan** | Daftar laporan siswa dengan status | `GET siswa/dashboard` |
| **2.2 Buat Laporan Baru** | Form input laporan pengaduan | `GET siswa/laporan/create` |
| **2.3 Simpan Laporan** | Submit laporan ke database | `POST siswa/laporan` |
| **2.4 Lihat Detail Laporan** | Tampilkan detail + tanggapan admin | `GET siswa/laporan/{id}` |
| **2.5 Hapus Laporan** | Delete laporan (hanya status menunggu) | `DELETE siswa/laporan/{id}` |

**Form Buat Laporan:**
- Kategori (dropdown dari database)
- Lokasi Kejadian (text input)
- Keterangan (textarea 5 baris)
- Validasi: Semua field wajib
- Status default: "Menunggu"

**Daftar Kategori:**
1. Ruang Kelas
2. Laboratorium
3. Perpustakaan
4. Toilet
5. Lapangan

**Status Laporan:**
- 🟡 **Menunggu** (belum diproses admin)
- 🔵 **Proses** (sedang ditangani admin)
- 🟢 **Selesai** (selesai ditangani)

**Fitur Dashboard:** 
- Tampilkan riwayat laporan dengan paginasi
- Informasi: Kategori, Lokasi, Status, Tanggal
- Aksi: Lihat detail, Hapus (untuk status menunggu)

---

## 💬 MODUL 3: FEEDBACK & TANGGAPAN

| Fitur | Deskripsi | Route |
|-------|-----------|--------|
| **3.1 Lihat Tanggapan Admin** | Tampilkan status & feedback dari admin | `GET siswa/laporan/{id}` |
| **3.2 Buat Feedback Siswa** | Rating kepuasan 1-5 | `POST siswa/laporan/{aspirasi}/feedback` |

**Data Tanggapan:**
- Status laporan (menunggu/proses/selesai)
- Keterangan dari admin (jika ada)
- Tanggal update

**Form Feedback:**
- Rating: 1 (Sangat Tidak Puas) - 5 (Sangat Puas)
- Radio button untuk setiap rating
- Fitur: Hanya tampil saat status = "Selesai"
- Fitur: Simpan feedback dan berikan notifikasi terima kasih

---

## 📊 MODUL 4: DASHBOARD ADMIN

| Fitur | Deskripsi | Route |
|-------|-----------|--------|
| **4.1 Lihat Dashboard Admin** | Statistik dan informasi ringkas | `GET admin/dashboard` |

**Informasi di Dashboard:**
1. **Total Siswa** - jumlah siswa terdaftar
2. **Total Laporan** - jumlah laporan keseluruhan
3. **Laporan Diproses** - laporan dengan status "Proses"
4. **Laporan Selesai** - laporan dengan status "Selesai"
5. **Laporan Terbaru** - list 5 laporan terakhir

**Tampilan:** 4 kartu statistik + tabel laporan terbaru

---

## 🏷️ MODUL 5: MANAJEMEN KATEGORI (ADMIN)

| Fitur | Deskripsi | Route |
|-------|-----------|--------|
| **5.1 Lihat Daftar Kategori** | List kategori dengan pagination | `GET admin/kategori` |
| **5.2 Buat Kategori Baru** | Form input kategori | `GET admin/kategori/create` |
| **5.3 Simpan Kategori** | Submit kategori baru ke database | `POST admin/kategori` |
| **5.4 Lihat Detail Kategori** | Tampilkan info kategori | `GET admin/kategori/{id}` |
| **5.5 Edit Kategori** | Form edit kategori | `GET admin/kategori/{id}/edit` |
| **5.6 Update Kategori** | Simpan perubahan kategori | `PUT admin/kategori/{id}` |
| **5.7 Hapus Kategori** | Delete kategori | `DELETE admin/kategori/{id}` |

**Data Kategori:**
- Nama Kategori (text wajib)
- Timestamps (created_at, updated_at)

**Fitur Daftar:**
- Pagination dengan bootstrap 5
- Aksi: Lihat, Edit, Hapus
- Search/filter (opsional)

---

## 📋 MODUL 6: MANAJEMEN LAPORAN & ASPIRASI (ADMIN)

| Fitur | Deskripsi | Route |
|-------|-----------|--------|
| **6.1 Lihat Daftar Laporan** | List laporan dengan filter status | `GET admin/laporan` |
| **6.2 Filter Laporan** | Filter berdasarkan status (belum/proses/selesai) | `GET admin/laporan?status=...` |
| **6.3 Lihat Detail Laporan** | Detail laporan + form update status | `GET admin/laporan/{id}` |
| **6.4 Update Status Laporan** | Ubah status & buat aspirasi/tanggapan | `PUT admin/laporan/{id}` |

**Form Filter:**
- Dropdown filter: Belum Diproses, Sedang Diproses, Selesai
- Tombol reset untuk clear filter

**Daftar Laporan:**
- Paginasi per halaman
- Kolom: No, NIS, Nama Siswa, Kategori, Lokasi, Status, Aksi
- Status dengan badge warna

**Detail Laporan:**
- **Bagian Kiri (8 kolom):**
  - NIS Siswa
  - Nama Siswa
  - Kelas
  - Kategori
  - Lokasi
  - Keterangan
  - Status Saat Ini
  - Tanggal Laporan
  
- **Bagian Kanan (4 kolom):**
  - Dropdown Status (Belum/Proses/Selesai)
  - Textarea Keterangan/Feedback
  - Tombol Simpan
  - Informasi Aspirasi (jika ada)

**Fitur Update Status:**
- Submit form untuk update status
- Otomatis membuat/update record Aspirasi
- Create feedback untuk siswa
- Redirect kembali dengan notifikasi sukses

---

## 🗃️ MODUL 7: DATA & RELASI

### Database Tables

**Tabel: users (default Laravel)**
- id, name, email, password, etc.

**Tabel: admins**
- id, nama, username (unik), password, remember_token, timestamps

**Tabel: siswas**
- id, nis (unik), nama, kelas, remember_token, timestamps

**Tabel: kategoris**
- id, nama_kategori, timestamps

**Tabel: laporan_pengaduans**
- id, siswa_id (FK→siswas), kategori_id (FK→kategoris), ket, lokasi, timestamps
- Cascade delete: hapus siswa/kategori otomatis hapus laporan

**Tabel: aspirasis**
- id, laporan_id (FK→laporan_pengaduans), admin_id (FK→admins)
- status (enum: menunggu, proses, selesai), feedback (nullable), timestamps
- Cascade delete: hapus laporan otomatis hapus aspirasi

### Relasi Model

```
Admin      1 ──→ ∞  Aspirasi
Siswa      1 ──→ ∞  LaporanPengaduan
Kategori   1 ──→ ∞  LaporanPengaduan
LaporanPengaduan  1 ──→ 1  Aspirasi
Aspirasi   ∞ ──→ 1  LaporanPengaduan
```

---

## 🎨 MODUL 8: FRONTEND & KOMPONEN

### Blade Components (Reusable)
| Komponen | Props | Deskripsi |
|----------|-------|-----------|
| **x-input** | name, type, placeholder, value, label | Input field dengan label & error class |
| **x-textarea** | name, placeholder, value, label, rows | Textarea dengan label & error class |
| **x-select** | name, label, options, value, placeholder, valueField, labelField | Dropdown select dengan opsi dinamis |

### Layouts
| Layout | Deskripsi |
|--------|-----------|
| **main** | HTML base dengan Bootstrap 5 CDN |
| **auth** | Login/Register centered layout |
| **siswa** | Navbar + container untuk siswa |
| **admin** | Navbar + container untuk admin |

### Navbar
- **Siswa Navbar** (Authenticated):
  - Brand: APSS
  - Menu: Dashboard, Laporan (dengan tambahan Buat Laporan), Kategori, Akun Saya, Logout
  
- **Admin Navbar** (Authenticated):
  - Brand: APSS Admin
  - Menu: Dashboard, Kategori, Laporan & Aspirasi, Dropdown Akun (Akun Saya, Logout)

- **Guest Navbar**:
  - Menu: Login Siswa, Login Admin

### Asset Structure
```
public/bs/
  ├── css/       (Bootstrap 5 CSS)
  ├── js/        (Bootstrap 5 JS)
  └── font/      (Bootstrap icons)
```

---

## 🔐 MODUL 9: KEAMANAN & MIDDLEWARE

| Middleware | Deskripsi |
|-----------|-----------|
| **guest:siswa** | Hanya untuk siswa belum login |
| **auth:siswa** | Hanya untuk siswa sudah login |
| **guest:admin** | Hanya untuk admin belum login |
| **auth:admin** | Hanya untuk admin sudah login |

### Guards Configuration (config/auth.php)
```
Guards:
  - web        → users table (default)
  - admin      → admins table + password
  - siswa      → siswas table + NIS only
```

---

## 📊 MODUL 10: FITUR LANJUTAN

| Fitur | Deskripsi |
|-------|-----------|
| **Paginasi Bootstrap 5** | List data dengan tombol navigasi halaman |
| **Status Badges** | Tampilan status dengan warna berbeda |
| **Cascade Delete** | Hapus parent otomatis hapus child records |
| **Password Hashing** | Keamanan password dengan bcrypt |
| **Session Management** | Session timeout & user identification |
| **Eloquent ORM** | Relasi database dengan Laravel models |
| **Form Validation** | Server-side & client-side validation |
| **Flash Messages** | Notifikasi sukses/gagal dengan alerts |
| **CSRF Protection** | Proteksi form dengan token |

---

## 📈 STATISTIK FITUR

| Kategori | Jumlah |
|----------|--------|
| **Routes** | 34 |
| **Controllers** | 10 |
| **Views** | 25+ |
| **Models** | 5 |
| **Migrations** | 8 |
| **Buttons/Aksi** | 50+ |
| **Form Fields** | 100+ |
| **Database Tables** | 8 |
| **Blade Components** | 3 |
| **Middleware Guards** | 4 |

---

## 🚀 AKSES APLIKASI

**Server:** http://127.0.0.1:8000

### Login Default (Admin)
```
Username: admin
Password: password
```

### Siswa
```
Registrasi: Gunakan NIS unik (10 digit)
Login: Masukkan NIS (tanpa password)
```

### Test Data Tersedia
- **Admin:** 1 akun
- **Siswa:** 10 akun default
- **Kategori:** 5 kategori
- **Laporan:** 15 laporan sample
- **Aspirasi:** 15 tanggapan sample

---

## 📝 CATATAN PENGEMBANGAN

- ✅ Semua fitur berhasil diimplementasikan
- ✅ Database properly seeded dengan data test
- ✅ Multi-guard authentication working
- ✅ Bootstrap 5 responsive design
- ✅ Eloquent relationships configured
- ✅ Middleware protection active
- ✅ Form validation implemented
- ✅ Pagination functional
- ✅ CSRF protected
- ✅ Session management working

---

**Last Updated:** March 29, 2026  
**Version:** 1.0  
**Framework:** Laravel 12 & Bootstrap 5
