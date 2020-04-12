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
        $listJurusan = ['Ilmu Hukum',
                        'Pendidikan MIPA',
                        'Administrasi Bank',
                        'Agroteknologi',
                        'Pertanian',
                        'Arsitektur',
                        'Ilmu Gizi',
                        'Perikanan',
                        'Matematika',
                        'Bioteknologi',
                        'Hubungan Internasional',
                        'Sastra Jepang',
                        'Pendidikan Dokter Hewan',
                        'Sistem Informasi',
                        'Kedokteran Gigi',
                        'D3 Teknik Mesin'];
        $fakultas = 1;

        foreach ($listJurusan as $jurusan) {
        	Jurusan::create([
                'id_fakultas' => $fakultas++,
                'nama_jurusan' => $jurusan
                ]);
        }
    }
}
