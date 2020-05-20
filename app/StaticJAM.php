<?php

namespace App;

use Illuminate\Support\Facades\DB;

class StaticJAM extends RemoteResource
{
    protected $default_resource = 'media';

    protected $name, $url;

    public function __construct($name = '', $url = '')
    {
        $this->base_uri = env('JAM_STATIC');
        $this->setAuth(['access_token' => env('JAM_STATIC_KEY')]);

        $this->name = $name;
        $this->url = $url;
    }

    public static function express($name, $url)
    {
        return (new StaticJAM($name, $url))->upload();
    }

    public function upload()
    {
        $res = $this->post([
            'file[name]' => $this->name,
            'file[url]' => $this->url
        ], null, 'form_params');

        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody()->getContents(), true)['url'];
        }
    }
}
