<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nama'];

    public function hobi(){
        return $this->belongsToMany(Hobi::class,'siswa_hobi');
    }
}
