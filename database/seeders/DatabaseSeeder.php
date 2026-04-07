<?php

namespace Database\Seeders;

use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\LaporanPengaduan;
use App\Models\Siswa;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Admin::firstOrCreate(
            ['username' => 'admin'],
            [
                'nama' => 'Naufal Prana Jati',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
            ]
        );

        // Create specific categories
        $kategoriNames = [
            'Ruang Kelas',
            'Laboratorium',
            'Perpustakaan',
            'Toilet',
            'Lapangan',
        ];

        $kategori = collect($kategoriNames)->map(function ($name) {
            return Kategori::firstOrCreate(['nama_kategori' => $name]);
        });

        $siswa = Siswa::factory()->count(10)->create();

        $laporan = LaporanPengaduan::factory()
            ->count(15)
            ->make()
            ->each(function ($laporan) use ($kategori, $siswa) {
                $laporan->kategori_id = $kategori->random()->id;
                $laporan->siswa_id = $siswa->random()->id;
                $laporan->save();
            });

        $laporan->each(function ($laporan) use ($admin){
            Aspirasi::factory()->create([
                'laporan_id' => $laporan->id,
                'admin_id' => $admin->id,
            ]);
        });
    }
}
