<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    // Table Name
    protected $table = 'animals';

    // parse a date to an age number
    public function getAge()
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }


    /**
     * Setup relationships
     */
    // setup relationship between animal and breed
    public function breed() {
        return $this->hasOne(Breed::class, 'id', 'breed_id');
    }

    // setup relationship between animal and species
    public function getSpecies()
    {
        return $this->hasOneThrough(Species::class, Breed::class);
    }

    // setup relationship between animal and department
    public function getDepartment()
    {
        return $this->hasOneThrough(Department::class, Species::class);
    }
    


    /**
     * Setup search function
     */

    // scope for search term
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%'.$search.'%')->orWhere('description', 'like', '%'.$search.'%');
    }
    
    // scope for gender
    public function scopeGender($query, $gender)
    {
        if($gender != '') {
            return $query->where('gender', '=', $gender);
        }
    }

    // scope for castreated
    public function scopeCastrated($query, $castrated)
    {
        if($castrated != '') {
            return $query->where('castrated', '=', $castrated);
        }
    }

    // scope for categories
    public function scopeCategory($query, $id)
    {
        return $query->whereHas('breed', function ($query) use ( $id ){
            $query->where('species_id', '=', $id);
        });
    }
}
