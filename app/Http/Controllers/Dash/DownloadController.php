<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function wordpress(){
        return redirect(get_wordpress_plugin_url());
    }
}
