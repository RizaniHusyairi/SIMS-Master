<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\SiswaKelas;
use App\Models\Absensi;
use App\Models\Guru;




class Kelas_jurusan extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class,'jurusan_id');
    }

    public function siswakelas(){
        return $this->hasMany(SiswaKelas::class);
    }

    public function absensi(){
        return $this->hasMany(Absensi::class);
    }

    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }
}
