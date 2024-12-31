<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userData = [
            [
                
                'nama' => 'a budi',
                'email' => 'abudi@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'teh budi',
                'email' => 'tehbudi@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'perawat',
            ],
            [
                'nama' => 'mang budi',
                'email' => 'mangbudi@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'pasien',
            ],
            [
                'nama' => 'neng budi',
                'email' => 'nengbudi@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'pegawai',
            ],
        ];

    foreach($userData as $key => $val){
        User::create($val);

    }
    }
}
