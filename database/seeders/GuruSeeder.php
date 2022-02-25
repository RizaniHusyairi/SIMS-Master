<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::insert([
            [
                'user_id' => 2,
                'NIP' => 634600,
                'tempat_lahir' => 'Samarinda',
                'tgl_lahir' => '2001-12-06',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'jl.banana'
            ], 
            [
                'user_id' => 4,
                'NIP' => 634601,
                'tempat_lahir' => 'Tenggarong',
                'tgl_lahir' => '2001-08-06',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'jl.perjuangan'
            ], 
            [
                'user_id' => 7,
                'NIP' => 634602,
                'tempat_lahir' => 'bontang',
                'tgl_lahir' => '2001-01-06',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'jl.mawar'
            ], 
        ]);
    }
}
