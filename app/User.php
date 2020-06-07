<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $resource_ids = [];

        $query = DB::table('apps')->where('user_id', $this->id)->select('remote_resource_id');
        foreach ($this->organizations()->get()->pluck('id')->toArray() as $organization_id) {
            $query->orWhere('organization_id', $organization_id);
        }

        $resource_ids = array_merge($resource_ids, $query->get()->pluck('remote_resource_id')->toArray());

        return App::listOrFail($resource_ids);
    }


    public function sendEmailVerificationNotification()
    {
        $this->email_token = Str::random(64);
        $this->save();
        $validation_url = url("dash/email?email={$this->email}&token={$this->email_token}");
        Email::express($this->email, __('emails.email_validation.body', [
            'url' => $validation_url
        ]), __('emails.email_validation.subject'), [__('emails.email_validation.action'), $validation_url]);
    }

    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_token' => 1,
        ])->save();
    }
}
