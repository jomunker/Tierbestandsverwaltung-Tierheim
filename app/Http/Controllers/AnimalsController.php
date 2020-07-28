<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Breed;
use App\Species;
use App\Department;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::orderBy('name', 'asc')->paginate(6);
        return view('pages.animal.overviewAnimals')->with('animals', $animals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('pages.animal.createAnimal')->with('departments', $departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form data
        $this->validate($request, [
            'name' => 'required',
            'rasse' => 'required',
            'tierart' => 'required',
            'farbe' => 'required'
        ]);

        // get department id
        $department = intval($request->input('abteilung'));

        // get value from 'tierart' field
        $speciesname = $request->input('tierart');
        // try to create a new species if it doesn't exist already
        $species = Species::firstOrCreate(['species'=>$speciesname], ['department_id'=>$department] );

        // get value from 'rasse' field
        $breedname = $request->input('rasse');
        // try to create a new breed if it doesn't exist already
        $breed = Breed::firstOrCreate(['breed'=>$breedname], ['species_id'=>$species->id] );

        // Create animal with values from form
        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->birth_date = $request->input('geburt');
        $animal->gender = $request->input('geschlecht');
        $animal->breed_id = $breed->id;
        $animal->colors = $request->input('farbe');
        $animal->size = $request->input('groesse');
        $animal->description = $request->input('beschreibung');
        $animal->admission_date = $request->input('aufnahme');
        $animal->mediated = $request->input('vermittelt');
        $animal->castrated = $request->input('kastriert');
        $animal->save();
        return redirect('/animals')->with('success', 'Tier angelegt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);
        return view('pages.animal.showAnimal')->with('animal', $animal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all();
        $animal = Animal::find($id);
        return view('pages.animal.editAnimal')
        ->with('animal', $animal)
        ->with('departments', $departments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // validate form data
         $this->validate($request, [
            'name' => 'required',
            'rasse' => 'required',
            'tierart' => 'required',
            'farbe' => 'required'
        ]);

        // get department id
        $department = intval($request->input('abteilung'));

        // get value from 'tierart' field
        $speciesname = $request->input('tierart');
        // try to create a new species if it doesn't exist already
        $species = Species::firstOrCreate(['species'=>$speciesname], ['department_id'=>$department] );

        // get value from 'rasse' field
        $breedname = $request->input('rasse');
        // try to create a new breed if it doesn't exist already
        $breed = Breed::firstOrCreate(['breed'=>$breedname], ['species_id'=>$species->id] );

        // Create animal with values from form
        $animal = Animal::find($id);
        $animal->name = $request->input('name');
        $animal->birth_date = $request->input('geburt');
        $animal->gender = $request->input('geschlecht');
        $animal->breed_id = $breed->id;
        $animal->colors = $request->input('farbe');
        $animal->size = $request->input('groesse');
        $animal->description = $request->input('beschreibung');
        $animal->admission_date = $request->input('aufnahme');
        $animal->mediated = $request->input('vermittelt');
        $animal->castrated = $request->input('kastriert');
        $animal->save();
        return redirect('/animals')->with('success', 'Tier aktualisiert');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        return redirect('/animals')->with('success', 'Tier entfernt');
    }
}
