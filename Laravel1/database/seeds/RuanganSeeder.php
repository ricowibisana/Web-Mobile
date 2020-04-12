<?php

use App\Ruangan;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listRuangan = ['HKM_001',
                        'PM_002',
                        'ADB_003',
                        'AGT_004',
                        'PTR_005',
                        'ARS_006',
                        'PIK_007',
                        'MTK_008',
                        'BTK_009',
                        'HI_010',
                        'SJP_011',
                        'PDH_012',
                        'SI_013',
                        'KG_014',
                        'TM_015'];
        $jurusan = 1;

        foreach ($listRuangan as $ruangan) {
        	Ruangan::create([
                'id_jurusan' => $jurusan++,
                'nama_ruang' => $ruangan
                ]);
        }
    }
}
