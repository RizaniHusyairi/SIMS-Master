<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SiswaKelas;
use App\Models\User;


class Siswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function siswakelas(){
        return $this->hasMany(SiswaKelas::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}