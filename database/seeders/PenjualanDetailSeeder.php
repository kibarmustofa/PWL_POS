<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = [
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Laptop ASUS ROG',
                'harga_beli' => 10000000,
                'harga_jual' => 12000000,
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Mouse Logitech G Pro',
                'harga_beli' => 500000,
                'harga_jual' => 600000,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Kaos Polos Hitam',
                'harga_beli' => 50000,
                'harga_jual' => 75000,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Celana Jeans Biru',
                'harga_beli' => 150000,
                'harga_jual' => 200000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Nasi Goreng Spesial',
                'harga_beli' => 15000,
                'harga_jual' => 20000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Mie Ayam Bakso',
                'harga_beli' => 12000,
                'harga_jual' => 17000,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Es Teh Manis',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Jus Alpukat',
                'harga_beli' => 8000,
                'harga_jual' => 12000,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Buku Tulis Sidu',
                'harga_beli' => 3000,
                'harga_jual' => 4500,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Pulpen Standard AE7',
                'harga_beli' => 2000,
                'harga_jual' => 3000,
            ],
        ];

        DB::table('m_barang')->insert($barang); 
    }
}
