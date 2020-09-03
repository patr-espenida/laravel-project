<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class film extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title','story','release_date','duration','genre_id','certificate_id'
    ];

    public function filmProducers(){
        return $this->hasMany(film_producer::class);
    }

}
