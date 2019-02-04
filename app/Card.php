<?php

namespace Carsdy;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cset_id', 'front', 'back', 'alt', 'comment'
    ];
}
