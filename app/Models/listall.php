<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listall extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'lastname',
        'number',
        'listall',
        'total',
        'sum',
        'cash',
    ];

    protected $casts = [

        'cash' => 'array',
        'listall' => 'array',

    ];
}
