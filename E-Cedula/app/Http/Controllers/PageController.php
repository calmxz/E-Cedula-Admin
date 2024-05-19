<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function individuals()
    {
        return view('home.individuals');
    }

    public function companies()
    {
        return view('home.company');
    }
}

