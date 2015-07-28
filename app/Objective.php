<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $fillable=[
        'dimension_id',
        'name',
        'description',
        'status'
    ];
}
