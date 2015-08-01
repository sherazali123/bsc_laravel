<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    protected $fillable=[
        'objective_id',
        'name',
        'description',
        'status'
    ];

    public function objective()
    {
        return $this->belongsTo('App\Objective');
    }

    public function measures()
    {
        return $this->hasMany('App\Measure');
    }
}
