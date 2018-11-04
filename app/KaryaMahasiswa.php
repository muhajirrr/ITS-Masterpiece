<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KaryaMahasiswa extends Model
{
    protected $fillable = [
        'title', 'title_slug', 'image', 'content'
    ];
}
