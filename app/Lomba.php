<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    protected $fillable = [
        'nama', 'nrp', 'kategori', 'angkatan', 'nama_lomba', 'juara', 'penyelenggara', 'bukti', 'status', 'id_user'
    ];
}