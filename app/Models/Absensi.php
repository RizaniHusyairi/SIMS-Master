<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detailabsensi;
use App\Models\Kelas_jurusan;
use App\Models\Guru;
use App\Models\Mapel;

class Absensi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function detailabsensi(){
        return $this->hasMany(Detailabsensi::class);
    }
    
    public function kelas_jurusan(){
        return $this->belongsTo(Kelas_jurusan::class,'kelas_jurusan_id');
    }
    
    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }
    public function mapel(){
        return $this->belongsTo(Mapel::class,'mapel_id');
    }
}
