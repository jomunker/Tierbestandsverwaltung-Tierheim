<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Animal;
use App\Breed;
use App\Species;
use App\Department;
use Fouladgar\EloquentBuilder\EloquentBuilder;
use SebastianBergmann\Environment\Console;

class AnimalsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'categories', 'showCategory', 'search']]);
        $this->middleware('admin', ['except' => ['index', 'show', 'categories', 'showCategory', 'search']]);
    }

    /**
     * Display a listing of the all animals.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::orderBy('name', 'asc')->paginate(6);
        return view('pages.animal.overviewAnimals')->with('animals', $animals);
    }

    /**
     * Handles search requests and returns all animals that match the search parameters.
     */
    public function search()
    {
        $request = request();
        $animals = Animal::Search($request->suche)->Gender($request->geschlecht)->Castrated($request->kastriert)->orderBy('name', 'asc')->paginate(6);
        return view('pages.animal.overviewAnimals')->with('animals', $animals);
    }

    /**
     * Show a page with all species.
     */
    public function categories()
    {
        $species = Species::orderBy('species', 'asc')->paginate(6);
        return view('pages.categories')->with('species', $species);
    }

    /**
     * Show a page with all animals of the specified species. 
     */
    public function showCategory($id)
    {
        $category = Species::find($id);
        return view('pages.showCategory')->with('category', $category);
    }

    /**
     * Show the form for creating a new animal.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('pages.animal.createAnimal')->with('departments', $departments);
    }

    /**
     * Store a newly created animal in storage.
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
            'farbe' => 'required',
            'tierbild' => 'image|nullable|max:5000'
        ]);

        /**
         * Handle relationships when creating a new animal
         */
        // get department id
        $department = intval($request->input('abteilung'));

        // get value from 'tierart' field
        $speciesname = $request->input('tierart');
        // try to create a new species if it doesn't exist already
        $species = Species::firstOrCreate(['species' => $speciesname], ['department_id' => $department]);
        // saves species
        $species->save();

        // get value from 'rasse' field
        $breedname = $request->input('rasse');
        // try to create a new breed if it doesn't exist already
        $breed = Breed::firstOrCreate(['breed' => $breedname], ['species_id' => $species->id]);
        // saves breed
        $breed->save();

        /**     
         * Handle file upload
         */
        if ($request->hasFile('tierbild')) {
            // get filename with extension
            $filenameWithExt = $request->file('tierbild')->getClientOriginalName();
            // get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('tierbild')->getClientOriginalExtension();
            // filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // upload image
            $path = $request->file('tierbild')->storeAs('public/animal_pictures', $filenameToStore);
        }

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
        if ($request->hasFile('tierbild')) {
            $animal->animal_picture = $filenameToStore;
        } else {
            $animal->animal_picture = "";
        }
        $animal->save();
        return redirect('/animals')->with('success', 'Tier angelegt');
    }

    /**
     * Display the specified animal.
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
     * Show the form for editing the specified animal.
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
     * Update the specified animal in storage.
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
            'farbe' => 'required',
            'tierbild' => 'image|nullable|max:5000'
        ]);

        /**
         * Handle relationships when creating a new animal
         */
        // get department id
        $department = intval($request->input('abteilung'));
        // return $department;

        // get value from 'tierart' field
        $speciesname = $request->input('tierart');
        // try to create a new species if it doesn't exist already
        $species = Species::firstOrCreate(['species' => $speciesname]);
        $species->department_id = $department;
        $species->save();


        // get value from 'rasse' field
        $breedname = $request->input('rasse');
        // try to create a new breed if it doesn't exist already
        $breed = Breed::firstOrCreate(['breed' => $breedname] , ['species_id' => $species->id]);
        // $breed->species_id = $species->id;
        $breed->save();


        /**     
         * Handle file upload
         */
        if ($request->hasFile('tierbild')) {
            // get filename with extension
            $filenameWithExt = $request->file('tierbild')->getClientOriginalName();
            // get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('tierbild')->getClientOriginalExtension();
            // filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // upload image
            $path = $request->file('tierbild')->storeAs('public/animal_pictures', $filenameToStore);
        }

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
        if ($request->hasFile('tierbild')) {
            if ($animal->animal_picture != null) {
                Storage::delete('public/animal_pictures/' . $animal->animal_picture);
                $animal->animal_picture = $filenameToStore;
            } 
        }
        $animal->save();
        return redirect('/animals')->with('success', 'Tier aktualisiert');
    }

    /**
     * Remove the specified animal from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);

        // delete image if exists
        if ($animal->animal_picture != null) {
            Storage::delete('public/animal_pictures/' . $animal->animal_picture);
        }

        $animal->delete();
        return redirect('/animals')->with('danger', 'Tier entfernt');
    }
}
