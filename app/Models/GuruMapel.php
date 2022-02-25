<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruMapel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }
    public function mapel(){
        return $this->belongsTo(Mapel::class,'mapel_id');
    }
}
