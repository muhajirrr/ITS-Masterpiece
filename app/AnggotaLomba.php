<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaLomba extends Model
{
    protected $fillable = [
        'nama', 'nrp', 'angkatan', 'id_lomba'
    ];

    public function lomba() {
        return $this->belongsTo('App\Lomba', 'id_lomba');
    }
}
