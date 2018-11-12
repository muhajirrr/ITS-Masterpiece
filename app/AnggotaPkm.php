<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaPkm extends Model
{
    protected $fillable = [
        'nama', 'nrp', 'angkatan', 'id_pkm'
    ];

    public function pkm() {
        return $this->belongsTo('App\PKM', 'id_pkm');
    }
}
