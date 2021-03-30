<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class experiences extends Model
{
    protected $fillable = [
        'title', 'year', 'description',
    ];
}
