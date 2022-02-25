<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SiswaKelas;
use App\Models\Absensi;

class Detailabsensi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function siswakelas(){
        return $this->belongsTo(SiswaKelas::class,'siswakelas_id');
    }
    public function absensi(){
        return $this->belongsTo(Absensi::class,'absensi_id');
    }



}
