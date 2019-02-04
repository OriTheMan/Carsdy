<?php

namespace Carsdy;

use Illuminate\Database\Eloquent\Model;

class CardSet extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'card_sets';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'title' => "My title",
        'access' => "public"
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'description', 'access'
    ];
}
