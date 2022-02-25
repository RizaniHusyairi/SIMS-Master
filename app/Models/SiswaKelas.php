<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Kelas_jurusan;
use App\Models\Nilai;
use App\Models\Detailabsensi;

class SiswaKelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function siswa(){
        return $this->belongsTo(Siswa::class,'siswa_id');
    }

    public function kelas_jurusan(){
        return $this->belongsTo(Kelas_jurusan::class,'kelas_jurusan_id');
    }

    public function nilai(){
        return $this->hasMany(Nilai::class);
    }

    public function detailabsensi(){
        return $this->hasMany(Detailabsensi::class);
    }
}
