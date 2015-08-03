<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $fillable=[
        'initiative_id',
        'name',
        'description',
        'period',
        'target',
        'starting_date',
        'status'
    ];

    public function initiative()
    {
        return $this->belongsTo('App\Initiative');
    }

    public function actual_measures()
    {
        return $this->hasMany('App\ActualMeasure');
    }
}
