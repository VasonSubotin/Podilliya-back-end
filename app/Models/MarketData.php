<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketData extends Model
{
    protected $guarded = [];

    protected $table = 'market_data';

    protected $dates = [
        'published_sort'
    ];

    public $timestamps = false;
}
