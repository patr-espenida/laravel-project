<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class film_producer extends Model
{
    protected $fillable = [
        'film_id','producer_id'
    ];



public function film()
{
    return $this->belongsTo(film::class);
}

public function producer()
{
    return $this->belongsTo(producer::class);
}

}
