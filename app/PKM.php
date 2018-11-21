<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PKM extends Model
{
    protected $table = 'pkms';
    protected $fillable = [
        'judul', 'juara', 'bukti', 'status', 'id_user'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function anggota() {
        return $this->hasMany('App\AnggotaPkm', 'id_pkm');
    }
    
    public function scopeAccepted($query) {
        return $query->where('status', 1);
    }

    public function scopeWaiting($query) {
        return $query->where('status', 0);
    }

    public function scopeRejected($query) {
        return $query->where('status', 2);
    }
}
