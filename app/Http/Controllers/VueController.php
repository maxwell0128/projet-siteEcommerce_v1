<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueController extends Controller
{

    // accueil
    public function accueil()
    {
        return view('index');
    }
    // about
    public function about()
    {
        return view('about');
    }
    // contact
    public function contact()
    {
        return view('contact');
    }
    // contact
    public function achat()
    {
        return view('achat');
    }
}
