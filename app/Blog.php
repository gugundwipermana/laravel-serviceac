<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
        'user_id',
        'title',
        'date',
        'image',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
