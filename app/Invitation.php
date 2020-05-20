<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'email', 'organization_id', 'role', 'used_at',
    ];

    protected $casts = [
        'used_at' => 'datetime',
    ];
}
