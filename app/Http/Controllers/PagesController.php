<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;
use App\Species;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }


}
