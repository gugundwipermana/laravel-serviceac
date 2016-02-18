<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        'contact',
        'quote',
        'image',
        'lat',
        'long'
    ];
}
