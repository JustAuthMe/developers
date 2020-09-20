<?php

namespace App\Http\Controllers\Dash;

use App\Email;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect('dash/apps');
    }

    public function doc()
    {
        return view('dash.doc');
    }
}
