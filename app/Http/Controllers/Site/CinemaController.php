<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index()
    {
        return view('site.pages.cinemas.index');
    }
}
