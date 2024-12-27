<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kamar')->insert([
            ['nama_kamar' => 'Violet','tipe_kamar' => 'VIP 1', 'kapasitas' => 1, 'status' => 'tersedia'],
            ['nama_kamar' => 'Tulip','tipe_kamar' => 'VIP 2', 'kapasitas' => 1, 'status' => 'tersedia'],
            ['nama_kamar' => 'Mawar','tipe_kamar'=> 'Kelas 1', 'kapasitas' => 2, 'status' => 'tersedia'],
            ['nama_kamar' => 'Melati','tipe_kamar' => 'Kelas 2', 'kapasitas' => 4, 'status' => 'tersedia'],
        ]);
    }
}
