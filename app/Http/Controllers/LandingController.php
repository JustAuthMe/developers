<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home(){
        $guzzle = new Client(['timeout' => 1.0, 'http_errors' => false, 'verify' => false, 'defaults' => ['exceptions' => false]]);
        $res = $guzzle->get('https://api.github.com/repos/JustAuthMe/wordpress-plugin/releases/latest');

        $wordpress_latest = 'https://github.com/JustAuthMe/wordpress-plugin/releases/';
        if($res->getStatusCode() == 200){
            $github = json_decode($res->getBody()->getContents(), true);
            if(isset($github['assets'][0]['browser_download_url'])){
                $wordpress_latest = $github['assets'][0]['browser_download_url'];
            }
        }
        return view('landing.home', compact('wordpress_latest'));
    }

    public function documentation(){
       // $documentation = (new \Parsedown())->text(file_get_contents('https://raw.githubusercontent.com/JustAuthMe/docs/master/fr_FR.md'));
        return view('landing.documentation');
    }
}
