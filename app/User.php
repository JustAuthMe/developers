<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'jam_id', 'email_verified_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsernameAttribute()
    {
        if ($this->firstname || $this->lastname) {
            return $this->firstname . ' ' . $this->lastname;
        }
        return $this->email;
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class)->withPivot('role');
    }

    public function applications()
    {
        //TODO: A REVOIR
        $resource_ids = [];

        $organization_ids = [];
        foreach ($this->organizations()->select('organization_id')->get()->toArray() as $relation) {
            $organization_ids[] = $relation['organization_id'];
        }
        $query = DB::table('apps')->where('user_id', $this->id)->select('remote_resource_id');
        foreach ($organization_ids as $organization_id) {
            $query->orWhere('organization_id', $organization_id);
        }
        $relations_apps = $query->get();
        $resource_ids_user = json_decode(json_encode($relations_apps), true);
        foreach ($resource_ids_user as $resource_id) {
            $resource_ids[] = $resource_id['remote_resource_id'];
        }

        return App::listOrFail($resource_ids);
    }
}
