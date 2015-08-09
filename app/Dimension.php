<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $fillable=[
        'name',
        'plan_id',
        'description',
        'status'
    ];
    
    public function plan()
    {
        return $this->belongsTo('App\Plan');
    }

    public function objectives()
    {
        return $this->hasMany('App\Objective');
    }
}
