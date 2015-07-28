<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $fillable=[
        'name',
        'description',
        'status'
    ];
}
