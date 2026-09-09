<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surat;

class SuratSeeder extends Seeder
{
    public function run(): void
    {
        $jenis = ['Masuk', 'Keluar'];

        for ($i = 1; $i <= 10; $i++) {
            Surat::create([
                'nomor_surat'       => 'SRT-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'tanggal_surat'     => now()->subDays($i)->format('Y-m-d'),
                'pengirim_penerima' => 'Pengirim ' . $i,
                'perihal'           => 'Perihal contoh surat nomor ' . $i,
                'jenis_surat'       => $jenis[$i % 2],
            ]);
        }
    }
}