<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineUser extends Model
{
    public $incrementing = false;

    protected $primaryKey = 'userId';
    protected $fillable = [
        'userId',
        'displayName',
        'pictureUrl',
        'statusMessage',
    ];
}
