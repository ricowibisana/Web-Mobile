<?php

use App\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listBarang = [ 'Meja',
        'Papan Tulis',
        'Remote AC',
        'Proyektor',
        'Kursi',
        'Kursi Meja',
        'Stop Kontak',
        'Spidol',
        'Stop Kontak',
        'Proyektor',
        'Remote AC',
        'Speaker',
        'Meja',
        'Papan Tulis'];
        $listTotal = [ '25','1','1','1','15','60','3','2','5','1','1','2','40','1' ];
        $listRusak = [ '2' ,'0','0','1','5' ,'6' ,'0','0','4','0','0','0','5' ,'0'];
        $listDefault = array('default-1.jpg' => 'default-1.jpg', 'default-2.jpg' => 'default-2.jpg', 'default-3.jpg' => 'default-3.jpg');
        $isi = 0;
        $ruangan = 1;

        foreach ($listBarang as $barang) {
            Barang::create([
                'id_ruang' => $ruangan++,
                'nama_barang' => $barang,
                'total_barang' => $listTotal[$isi],
                'rusak_barang' => $listRusak[$isi++],
                'foto' => array_rand($listDefault, 1),
                'created_by' => 1,
                'updated_by' => rand(1,2)
                ]);
        }
    }
}
