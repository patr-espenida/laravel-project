<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producer extends Model
{
    protected $fillable = [
        'name','email', 'website'
    ];
}
