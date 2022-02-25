<?php

namespace Database\Seeders;

use App\Models\GuruMapel;
use Illuminate\Database\Seeder;

class GuruMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GuruMapel::create([
            'mapel_id' => 1,
            'guru_id' => 1
        ]);
        GuruMapel::create([
            'mapel_id' => 1,
            'guru_id' => 2
        ]);
    }
}
