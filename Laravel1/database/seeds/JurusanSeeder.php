<?php

use App\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listJurusan = ['Ekonomi Internasional',
                        'Hukum Tata Negara',
                        'Ilmu Sejarah',
                        'Agroteknologi',
                        'Ilmu Ekonomi Peternakan',
                        'Arsitektur',
                        'Ilmu Gizi',
                        'Perikanan',
                        'Matematika',
                        'Perhotelan',
                        'Hubungan Internasional',
                        'Sastra Jepang',
                        'Pendidikan Dokter Hewan',
                        'Sistem Informasi'];
        $fakultas = 1;
        foreach ($listJurusan as $jurusan) {
            Jurusan::create([
                'id_fakultas' => $fakultas++,
                'nama_jurusan' => $jurusan
                ]);
        }
    }
}
