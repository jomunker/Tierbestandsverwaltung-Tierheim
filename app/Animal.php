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
}
