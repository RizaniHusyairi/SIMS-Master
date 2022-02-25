<?php

namespace App\Http\Controllers;

use App\Models\Kelas_jurusan;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Mapel;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function index(){
        return view('admin.home',[
            'dtsiswa' => Siswa::all()->count(),
            'dtguru' => Guru::all()->count(),
            'dtkelas' => Kelas_jurusan::all()->count(),
            'dtmapel' => Mapel::all()->count()
        ]);
    }

    public function input(){
        return view('admin.inputwali',[
            'dtguru' => Guru::all()
        ]);
    }

    public function dashboard(){
        return view('welcome',[
            'dtsiswa' => Siswa::all()->count(),
            'dtguru' => Guru::all()->count(),
            'dtkelas' => Kelas_jurusan::all()->count(),
            'dtmapel' => Mapel::all()->count()
        ]);
    }
}
