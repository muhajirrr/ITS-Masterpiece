<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaPaper extends Model
{
    protected $fillable = [
        'nama', 'nrp', 'angkatan', 'id_paper'
    ];

    public function paper() {
        return $this->belongsTo('App\Paper', 'id_paper');
    }
}
