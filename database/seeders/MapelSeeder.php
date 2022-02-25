<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mapel::create([
            'nama_mapel' => 'Matematika',
            'jurusan_id' => 1, 
            'KKM' => 75
        ]);
        Mapel::create([
            'nama_mapel' => 'Kimia',
            'jurusan_id' => 1,
            'KKM' => 70
        ]);
        Mapel::create([
            'nama_mapel' => 'Fisika',
            'jurusan_id' => 1,
            'KKM' => 70
            
        ]);
        Mapel::create([
            'nama_mapel' => 'Sosiologi',
            'jurusan_id' => 2,
            'KKM' => 68
        ]);
        Mapel::create([
            'nama_mapel' => 'Ekonomi',
            'jurusan_id' => 2,
            'KKM' => 70
        ]);
        Mapel::create([
            'nama_mapel' => 'Sejarah',
            'jurusan_id' => 2,
            'KKM' => 75
        ]);
    }
}
