<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\MapelSeeder;
use Database\Seeders\JurusanSeeder;
use Database\Seeders\KelasjurusanSeeder;
use Database\Seeders\GuruMapelSeeder;
use Database\Seeders\KelasSeeder;
use Database\Seeders\GuruSeeder;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'=>'Rizani Husyairi',
            'email' => 'admin@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'Admin'
        ]);
        User::create([
            'name'=>'Juli Fitriani',
            'email' => 'juli@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'Guru'
        ]);
        User::create([
            'name'=>'Ari',
            'email' => 'arik@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'WaliSiswa'
        ]);
        User::create([
            'name'=>'Guru',
            'email' => 'guru@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'Guru'
        ]);
        User::create([
            'name'=>'Pandaman',
            'email' => 'Pandaman@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'WaliSiswa'
        ]);
        User::create([
            'name'=>'Siswa',
            'email' => 'Siswa@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'WaliSiswa'
        ]);
        
        User::create([
            'name'=>'Guru2',
            'email' => 'guru2@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'Guru'
        ]);


        $this->call([
            KelasSeeder::class,
            JurusanSeeder::class,
            KelasjurusanSeeder::class,
            MapelSeeder::class,
            GuruSeeder::class,
            GuruMapelSeeder::class,
            SiswaSeeder::class
        ]);
    }
}
