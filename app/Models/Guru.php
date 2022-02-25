<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kelas_jurusan;
use App\Models\GuruMapel;
use App\Models\Absensi;

class Guru extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function gurumapel(){
        return $this->hasMany(GuruMapel::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function kelas_jurusan(){
        return $this->hasOne(Kelas_jurusan::class);
    }
    public function absensi(){
        return $this->hasMany(Absensi::class);
    }

}
