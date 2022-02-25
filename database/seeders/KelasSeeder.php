<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'tingkat_kelas' => 'X',
            
        ]);
        
        Kelas::create([
            'tingkat_kelas' => 'XI',
            
        ]);
       
        Kelas::create([
            'tingkat_kelas' => 'XII',
        ]);
        
    }
}
