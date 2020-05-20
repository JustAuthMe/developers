<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    const ROLE_OWNER = 999;
    const ROLE_ADMIN = 10;
    const ROLE_USER = 1;

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role');
    }
}
