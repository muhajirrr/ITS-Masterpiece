<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PKM extends Model
{
    protected $table = 'pkms';
    protected $fillable = [
        'nama', 'judul', 'juara', 'bukti', 'status', 'id_user'
    ];
}
