<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function index()
    {
        return view('lang');
    }

    public function change($locale)
    {
        if (in_array($locale, ['pt', 'es','en'])) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }

}
