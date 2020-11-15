<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home(){
        return view('landing.home');
    }

    public function documentation(){
       // $documentation = (new \Parsedown())->text(file_get_contents('https://raw.githubusercontent.com/JustAuthMe/docs/master/fr_FR.md'));
        return view('landing.documentation');
    }
}
