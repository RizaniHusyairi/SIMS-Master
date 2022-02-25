<?php

namespace Database\Seeders;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([

                'user_id' => 3,
                'NISN' => 123400,
                'tgl_lahir'=> '1999-03-04',
                'tempat_lahir'=>'Hutan',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'jl.pemuda',
                'nama_wali'=> 'Banana'
        ]);
        Siswa::create([

                'user_id' => 5,
                'NISN' => 123401,
                'tgl_lahir'=> '1999-08-06',
                'tempat_lahir'=>'Samarinda',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'jl.Pramuka',
                'nama_wali'=> 'wali'
        ]);
        Siswa::create([

                'user_id' => 6,
                'NISN' => 123402,
                'tgl_lahir'=> '1999-02-06',
                'tempat_lahir'=>'Samarinda',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'jl.gelatik',
                'nama_wali'=> 'a'
        ]);

        SiswaKelas::create([
            'siswa_id' => 1,
            'kelas_jurusan_id' => 1
        ]);
        SiswaKelas::create([
            'siswa_id' => 2,
            'kelas_jurusan_id' => 2        
        ]);
        SiswaKelas::create([
            'siswa_id' => 3,
            'kelas_jurusan_id' => 4     
        ]);

        Nilai::insert([
            //siswa 1
            [
                'siswakelas_id' => 1,
                'mapel_id' => 1,
                'Semester' => 1

            ],
            [
                'siswakelas_id' => 1,
                'mapel_id' => 2,
                'Semester' => 1

            ],
            [
                'siswakelas_id' => 1,
                'mapel_id' => 3,
                'Semester' => 1
            ],
            [
                'siswakelas_id' => 1,
                'mapel_id' => 1,
                'Semester' => 2
            ],
            [
                'siswakelas_id' => 1,
                'mapel_id' => 2,
                'Semester' => 2
            ],
            [
                'siswakelas_id' => 1,
                'mapel_id' => 3,
                'Semester' => 2
            ],
            //end siswa 1

            //siswa 2
            [
                'siswakelas_id' => 2,
                'mapel_id' => 1,
                'Semester' => 1

            ],
            [
                'siswakelas_id' => 2,
                'mapel_id' => 2,
                'Semester' => 1

            ],
            [
                'siswakelas_id' => 2,
                'mapel_id' => 3,
                'Semester' => 1
            ],
            [
                'siswakelas_id' => 2,
                'mapel_id' => 1,
                'Semester' => 2
            ],
            [
                'siswakelas_id' => 2,
                'mapel_id' => 2,
                'Semester' => 2
            ],
            [
                'siswakelas_id' => 2,
                'mapel_id' => 3,
                'Semester' => 2
            ],
            //end siswa 2
            
            //siswa 3
            [
                'siswakelas_id' => 3,
                'mapel_id' => 4,
                'Semester' => 1

            ],
            [
                'siswakelas_id' => 3,
                'mapel_id' => 5,
                'Semester' => 1

            ],
            [
                'siswakelas_id' => 3,
                'mapel_id' => 6,
                'Semester' => 1
            ],
            [
                'siswakelas_id' => 3,
                'mapel_id' => 4,
                'Semester' => 2
            ],
            [
                'siswakelas_id' => 3,
                'mapel_id' => 5,
                'Semester' => 2
            ],
            [
                'siswakelas_id' => 3,
                'mapel_id' => 6,
                'Semester' => 2
            ],
        ]);
    }
}
