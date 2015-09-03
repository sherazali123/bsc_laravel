<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable=[
        'name',
        'vision',
        'user_id',
        'period',
        'starting_date',
        'ending_date',
        'description',
        'status'
    ];
    
    public function dimensions()
    {
        return $this->hasMany('App\Dimension');
    }
}
