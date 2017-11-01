<?php

namespace App\Maze;

use Illuminate\Database\Eloquent\Model;

class Maze extends Model
{
    protected $fillable = [
        'targetType',
        'targetId',
        'width',
        'height',
        'mazeData',
        'location',
    ];
}
