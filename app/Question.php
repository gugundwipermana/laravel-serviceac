<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'description'
    ];

    public function getJum()
    {
        $jum = \DB::table('questions')->count();

        return $jum;
    }

    public function getFive()
    {
        $result = \DB::table('questions')->orderBy('id', 'DESC')->take(5)->get();

        return $result;
    }
}
