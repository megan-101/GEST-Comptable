<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trace extends Model
{
    protected $fillable = [
        "action",
        "message",
        "user_id",
    ];
}
