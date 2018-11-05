<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    protected $fillable = [
        'nama', 'angkatan', 'departemen', 'nama_lomba', 'juara', 'penyelenggara', 'bukti', 'status'
    ];
}