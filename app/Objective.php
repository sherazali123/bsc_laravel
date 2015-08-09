<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{

    public $averge;

    protected $fillable=[
        'dimension_id',
        'name',
        'description',
        'status'
    ];

    public function dimension()
    {
        return $this->belongsTo('App\Dimension');
    }

    public function initiatives()
    {
        return $this->hasMany('App\Initiative');
    }
}
