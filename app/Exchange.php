<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $fillable = [
        'nama', 'angkatan', 'departemen', 'keterangan', 'bukti', 'status'
    ];
}
