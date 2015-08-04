<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActualMeasure extends Model
{
    protected $fillable=[
        'measure_id',
        'month',
        'actual_measure',
        'status'
    ];

    public function measure()
    {
        return $this->belongsTo('App\Measure');
    }
}
