<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    // Table Name
    protected $table = 'animals';

    public function getAge()
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }

    public function breed() {
        return $this->hasOne(Breed::class, 'id', 'breed_id');
    }

    public function getSpecies()
    {
        return $this->hasOneThrough(Species::class, Breed::class);
    }

    public function getDepartment()
    {
        return $this->hasOneThrough(Department::class, Species::class);
    }
}
