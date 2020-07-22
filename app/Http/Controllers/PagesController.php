<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function singleAnimal()
    {
        return view('pages.animal.singleAnimal');
    }

    public function createAnimal()
    {
        return view('pages.animal.createAnimal');
    }

    public function editAnimal()
    {
        return view('pages.animal.editAnimal');
    }
}
