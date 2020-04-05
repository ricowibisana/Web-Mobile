<?php

use Illuminate\Database\Seeder;
use App\Fakultas;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listFakultas = ['Fakultas Ekonomi',
                        'Fakultas Hukum',
                        'Fakultas Ilmu Budaya',
                        'Fakultas Pertanian',
                        'Fakultas Peternakan',
                        'Fakultas Teknik',
                        'Fakultas Kedokteran',
                        'Fakultas Perikanan dan Ilmu Kelautan',
                        'Fakultas Matematika dan Ilmu Pengetahuan Alam',
                        'Fakultas Pariwisata dan Perhotelan',
                        'Fakultas Ilmu Sosial dan Ilmu Politik',
                        'Fakultas Ilmu Sosial dan Komunikasi',
                        'Fakultas Kedokteran Hewan',
                        'Fakultas Ilmu Komputer'];

        foreach ($listFakultas as $fakultas) {
        	Fakultas::create([
                'nama_fakultas' => $fakultas
                ]);
        }
    }
}
