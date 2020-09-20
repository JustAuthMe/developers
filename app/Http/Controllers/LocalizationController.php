<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{

    public function index($locale) {
        if (!in_array($locale, ['fr', 'en'])){
            $locale = 'en';
        }
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
