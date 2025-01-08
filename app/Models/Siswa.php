<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nama','user_id'];

    public function hobi(){
        return $this->belongsToMany(Hobi::class,'siswa_hobi');
    }
}
