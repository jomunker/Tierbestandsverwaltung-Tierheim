<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of all departments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('department', 'asc')->get();
        return view('pages.department.overviewDepartments')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new department.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.department.createDepartment');
    }

    /**
     * Store a newly created department in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form data
        $this->validate($request, [
            'abteilungsname' => 'required|unique:departments,department',
            'kontaktvorname' => 'required',
            'kontaktnachname' => 'required',
            'kontakttelefon' => 'required'
        ]);

        // Create animal with values from form
        $department = new Department;
        $department->department = $request->input('abteilungsname');
        $department->contact_name = $request->input('kontaktvorname');
        $department->contact_surname = $request->input('kontaktnachname');
        $department->contact_telefon = $request->input('kontakttelefon');
        $department->save();
        return redirect('/departments')->with('success', 'Abteilung angelegt');
    }

    /**
     * Display the specified department.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $department = Department::find($id);
        // return view('pages.department.showDepartment')-with('department', $department);
    }

    /**
     * Show the form for editing the specified department.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('pages.department.editDepartment')->with('department', $department);
    }

    /**
     * Update the specified department in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate form data
        $this->validate($request, [
            'abteilungsname' => 'required|unique:departments,department,' . $id,
            'kontaktvorname' => 'required',
            'kontaktnachname' => 'required',
            'kontakttelefon' => 'required'
        ]);

        // Create animal with values from form
        $department = Department::find($id);
        $department->department = $request->input('abteilungsname');
        $department->contact_name = $request->input('kontaktvorname');
        $department->contact_surname = $request->input('kontaktnachname');
        $department->contact_telefon = $request->input('kontakttelefon');
        $department->save();
        return redirect('/departments')->with('success', 'Abteilung aktualisiert');
    }

    /**
     * Remove the specified department from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);

        if (!$department->species->isNotEmpty()) {
            $department->delete();
            return redirect('/departments')->with('success', 'Abteilung entfernt');
        } else {
            return redirect('/departments')->with('error', 'Diese Abteilung ist einem oder mehreren Tieren zugewiesen und kann nicht gelöscht werden!');
        }
    }
}
