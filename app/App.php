<?php

namespace App;

use Illuminate\Support\Facades\DB;

class App extends RemoteResource
{
    protected $base_uri;
    protected $default_resource = 'client_app';

    protected $id, $app_id, $domain, $name, $redirect_url, $data, $logo, $secret, $dev;

    public static $data_available = [
        'firstname' => "Prénom",
        'lastname' => "Nom",
        'birthdate' => "Date de naissance",
        'avatar' => "Photo de profil"
    ];

    public function __construct($id = 0, $app_id = 0, $domain = '', $name = '', $redirect_url = '', $data = [], $logo = '', $secret = '', $dev = false)
    {
        $this->base_uri = env('JAM_CORE');
        $this->setAuth(['access_token' => env('JAM_CORE_KEY')]);

        $this->id = $id;
        $this->app_id = $app_id;
        $this->domain = $domain;
        $this->name = $name;
        $this->redirect_url = $redirect_url;
        $this->data = $data;
        $this->logo = $logo;
        $this->secret = $secret;
        $this->dev = $dev;
    }

    public static function findOrFail($id)
    {
        $res = (new self())->get('client_app/' . $id);
        if ($res->getStatusCode() == 200) {
            $res = json_decode($res->getBody()->getContents(), true);
            return new self($res['client_app']['id'], $res['client_app']['app_id'], $res['client_app']['domain'], $res['client_app']['name'], $res['client_app']['redirect_url'], $res['client_app']['data'], $res['client_app']['logo'], $res['client_app']['secret'], $res['client_app']['dev']);
        }
        if ($res->getStatusCode() == 404) {
            DB::table('apps')->where('remote_resource_id', $id)->delete();
        }

        return null;
    }

    public static function listOrFail($ids)
    {
        if (count($ids) == 1) return [self::findOrFail($ids[0])];

        $res = (new self())->get('client_app/?list=' . implode(',', $ids));
        if ($res->getStatusCode() == 200) {
            $res = json_decode($res->getBody()->getContents(), true);
            $apps = [];
            foreach ($res['client_apps'] as $client_app) {
                $apps[] = new self($client_app['id'], $client_app['app_id'], $client_app['domain'], $client_app['name'], $client_app['redirect_url'], $client_app['data'], $client_app['logo'], $client_app['secret'], $res['client_app']['dev']);
            }
            return $apps;
        }
        return [];
    }

    public function revokeSecret()
    {
        $this->put([], 'client_app/' . $this->id . '/revoke_secret');
    }

    public static function create($data)
    {
        return (new self())->post([
            'domain' => $data['domain'],
            'name' => $data['name'],
            'redirect_url' => $data['redirect_url'],
            'data' => json_encode($data['data']),
            'logo' => $data['logo']
        ]);
    }

    public function update($data)
    {
        $data['data'] = json_encode($data['data']);
        return (new self())->put($data, 'client_app/' . $this->id);
    }

    public function getOwner()
    {
        $app_relation = DB::table('apps')->where('remote_resource_id', $this->id)->get()->first();
        if ($app_relation->user_id) {
            return User::find($app_relation->user_id);
        } else {
            return Organization::find($app_relation->organization_id);
        }
    }

    public function setOwner($owner)
    {
        DB::table('apps')->where('remote_resource_id', $this->id)->delete();
        if (get_class($owner) == User::class) {
            DB::table('apps')->insert([
                'remote_resource_id' => $this->id,
                'user_id' => $owner->id
            ]);
        } else {
            DB::table('apps')->insert([
                'remote_resource_id' => $this->id,
                'organization_id' => $owner->id
            ]);
        }
    }

    public function isAuthorized($user)
    {
        $organization_ids = [];
        foreach ($user->organizations()->select('organization_id')->get()->toArray() as $relation) {
            $organization_ids[] = $relation['organization_id'];
        }

        $relation = DB::table('apps')->where('remote_resource_id', $this->id)->get()->first();

        if ($relation->user_id) {
            return $user->id == $relation->user_id;
        } else {
            foreach ($organization_ids as $organization_id) {
                return $organization_id == $relation->organization_id;
            }
        }
    }
}
