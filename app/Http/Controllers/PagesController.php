<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function showAnimal()
    {
        return view('pages.animal.showAnimal');
    }

    public function createAnimal()
    {
        return view('pages.animal.createAnimal');
    }

    public function editAnimal()
    {
        return view('pages.animal.editAnimal');
    }

    public function viewBreeds()
    {
        return view('pages.breed.overviewBreeds');
    }

    public function createBreed()
    {
        return view('pages.breed.createBreed');
    }

    public function editBreed()
    {
        return view('pages.breed.editAnimal');
    }
}
