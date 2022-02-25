<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GuruMapel;
use App\Models\Nilai;
use App\Models\Jurusan;
use App\Models\Absensi;

class Mapel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function gurumapel()
    {
        return $this->hasMany(GuruMapel::class);
    }
    public function nilai(){
        return $this->hasMany(Nilai::class);
    }
    public function absensi(){
        return $this->hasMany(Absensi::class);
    }
    public function jurusan(){
        return $this->belongsTo(Jurusan::class,'jurusan_id');
    }

}
