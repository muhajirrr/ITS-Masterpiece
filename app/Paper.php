<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = [
        'nama', 'angkatan','judul', 'status_paper', 'bukti', 'status', 'id_user'
    ];
}
