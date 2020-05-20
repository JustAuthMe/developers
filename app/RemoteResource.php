<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class RemoteResource
{
    protected $base_uri;
    protected $default_resource;
    private $headers = [];

    private function client()
    {
        return new Client([
            'base_uri' => $this->base_uri,
            'timeout' => 2.0,
            'headers' => $this->headers,
            'http_errors' => false
        ]);
    }

    public function get($resource = null)
    {
        if (!$resource) {
            $resource = $this->default_resource;
        }
        return self::client()->get($resource);
    }

    public function post($data, $resource = null, $data_type = 'json')
    {
        if (!$resource) {
            $resource = $this->default_resource;
        }

        if ($data_type == 'json') {
            $data = [
                RequestOptions::JSON => $data
            ];
        }

        if ($data_type == 'form_params') {
            $data = [
                'form_params' => $data
            ];
        }

        return self::client()->post($resource, $data);
    }

    public function put($data, $resource = null)
    {
        if (!$resource) {
            $resource = $this->default_resource;
        }

        return self::client()->put($resource, [
            RequestOptions::JSON => $data
        ]);
    }

    public function setAuth($options)
    {
        if (isset($options['access_token'])) {
            $this->headers['X-Access-Token'] = $options['access_token'];
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
