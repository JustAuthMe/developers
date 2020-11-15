<?php

namespace App;

use Illuminate\Support\Facades\DB;

class App extends RemoteResource
{
    protected $base_uri;
    protected $default_resource = 'client_app';

    protected $id, $app_id, $url, $name, $redirect_url, $data, $logo, $secret, $dev;

    public static $data_available = [
        'identity' => [
            'lastname',
            'firstname',
            'birthdate',
            'birthlocation',
            'avatar'
        ],
        'address' => [
            'address_1',
            'address_2',
            'postal_code',
            'city',
            'state',
            'country'
        ],
        'buisness' => [
            'job',
            'company'
        ]
    ];

    public function __construct(array $data = [])
    {
        $this->base_uri = env('JAM_CORE_API');
        $this->setAuth(['access_token' => env('JAM_CORE_KEY')]);

        $this->id = isset($data['id']) ? $data['id'] : 0;
        $this->app_id = isset($data['app_id']) ? $data['app_id'] : 0;
        $this->url = isset($data['url']) ? $data['url'] : '';
        $this->name = isset($data['name']) ? $data['name'] : '';
        $this->redirect_url = isset($data['redirect_url']) ? $data['redirect_url'] : '';
        $this->data = isset($data['data']) ? $data['data'] : [];
        $this->logo = isset($data['logo']) ? $data['logo'] : env('DEFAULT_APP_LOGO');
        $this->secret = isset($data['secret']) ? $data['secret'] : '';
        $this->dev = isset($data['dev']) ? $data['dev'] : false;
        $this->id = isset($data['id']) ? $data['id'] : 0;
    }

    public static function getByUrl($url)
    {
        $res = (new self())->get('client_app?url=' . $url);
        if ($res->getStatusCode() == 200) {
            $client_app = json_decode($res->getBody()->getContents(), true)['client_app'];
            return new self($client_app);
        }
        return null;
    }

    public static function findOrFail($id)
    {
        $res = (new self())->get('client_app/' . $id);
        if ($res->getStatusCode() == 200) {
            $client_app = json_decode($res->getBody()->getContents(), true)['client_app'];
            return new self($client_app);
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
                $apps[] = new self($client_app);
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
            'url' => $data['url'],
            'name' => $data['name'],
            'redirect_url' => $data['redirect_url'],
            'data' => json_encode($data['data']),
            'logo' => $data['logo']
        ]);
    }

    public function update($data)
    {
        if (isset($data['data'])) {
            $data['data'] = json_encode($data);
        }
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
        $relation = DB::table('apps')->where('remote_resource_id', $this->id)->get()->first();
        if ($relation) {
            if ($relation->user_id) {
                return $user->id == $relation->user_id;
            } else {
                return in_array($relation->organization_id, $user->organizations()->get()->pluck('id')->toArray());
            }
        }
        return false;
    }
}
