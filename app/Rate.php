<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    const BUY = 1;
    const SALE = 2;

    protected $fillable = [
        'date',
        'currency',
        'buy_or_sale',
        'money',
        'rate',
        'money_TWD',
        'realized_profit'
    ];
}
