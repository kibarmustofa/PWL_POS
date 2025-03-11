<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjualan = [
            [
                'user_id' => 1,
                'pembeli' => 'Budi Santoso',
                'penjualan_kode' => 'PJL001',
                'penjualan_tanggal' => '2023-10-26 10:00:00',
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Siti Aminah',
                'penjualan_kode' => 'PJL002',
                'penjualan_tanggal' => '2023-10-26 11:30:00',
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Andi Wijaya',
                'penjualan_kode' => 'PJL003',
                'penjualan_tanggal' => '2023-10-26 13:45:00',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Dewi Lestari',
                'penjualan_kode' => 'PJL004',
                'penjualan_tanggal' => '2023-10-26 15:20:00',
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Rudi Hartono',
                'penjualan_kode' => 'PJL005',
                'penjualan_tanggal' => '2023-10-27 09:15:00',
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Maya Sari',
                'penjualan_kode' => 'PJL006',
                'penjualan_tanggal' => '2023-10-27 12:00:00',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Hendra Gunawan',
                'penjualan_kode' => 'PJL007',
                'penjualan_tanggal' => '2023-10-27 14:30:00',
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Lisa Permata',
                'penjualan_kode' => 'PJL008',
                'penjualan_tanggal' => '2023-10-27 16:45:00',
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Joko Susilo',
                'penjualan_kode' => 'PJL009',
                'penjualan_tanggal' => '2023-10-28 10:30:00',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Dina Rahmawati',
                'penjualan_kode' => 'PJL010',
                'penjualan_tanggal' => '2023-10-28 13:15:00',
            ],
        ];

        DB::table('t_penjualan')->insert($penjualan); 
    }
}
