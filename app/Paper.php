<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = [
        'nama', 'himpunan', 'judul', 'status_paper', 'bukti', 'status'
    ];
}
