<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mapel;
use App\Models\Kelas_jurusan;

class Jurusan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function mapel(){
        return $this->hasMany(Mapel::class);
    }

    public function kelas_jurusan(){
        return $this->hasMany(Kelas_jurusan::class);
    }
    
}
