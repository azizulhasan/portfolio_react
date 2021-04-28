<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usercontacts extends Model
{
    protected $fillable = [
        'name', 'email', 'message', 
    ];
}
