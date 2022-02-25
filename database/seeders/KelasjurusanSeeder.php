<?php

namespace Database\Seeders;

use App\Models\Kelas_jurusan;
use Illuminate\Database\Seeder;

class KelasjurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas_jurusan::create([
            'kelas_id' => 1 , 
            'Jurusan_id' => 1 , 
            'jumlah' => 1,

        ]);
        Kelas_jurusan::create([
            'kelas_id' => 2 , 
            'Jurusan_id' => 1 , 
            'jumlah' => 2,

        ]);
        Kelas_jurusan::insert([
            ['kelas_id' => 3 , 'Jurusan_id' => 1],
            ['kelas_id' => 1 , 'Jurusan_id' => 2],
            ['kelas_id' => 2 , 'Jurusan_id' => 2],
            ['kelas_id' => 3 , 'Jurusan_id' => 2],
            
        ]);
    }
}
