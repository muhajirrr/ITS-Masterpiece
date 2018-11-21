<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $fillable = [
        'nama', 'nrp','angkatan', 'keterangan', 'bukti', 'status', 'keterangan_reject', 'id_user'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
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
