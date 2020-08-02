<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Species;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function search()
    {
        $species = Species::all();
        return view('pages.search')->with('species', $species);
    }
}
