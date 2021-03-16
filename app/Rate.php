<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    const BUY = 1;
    const SALE = 2;

    const WHO_ME = 1;
    const WHO_MOTHER = 2;

    protected $fillable = [
        'user_id',
        'date',
        'currency',
        'who',
        'buy_or_sale',
        'money',
        'rate',
        'money_TWD',
        'realized_profit'
    ];
}
