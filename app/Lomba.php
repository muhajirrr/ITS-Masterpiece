<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    protected $fillable = [
        'nama_lomba', 'juara', 'penyelenggara', 'bukti', 'status', 'id_user'
    ];

    public function anggota() {
        return $this->hasMany('App\AnggotaLomba', 'id_lomba');
    }

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }
}