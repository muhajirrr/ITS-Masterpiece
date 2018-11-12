<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = [
        'judul', 'status_paper', 'bukti', 'status', 'id_user'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function anggota() {
        return $this->hasMany('App\AnggotaPaper', 'id_paper');
    }
}
