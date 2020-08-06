<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $fillable = ['species', 'department_id'];

    /**
     * Setup relationships
     */
    // relationship between species and department
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    // relationship between species and breeds
    public function breeds()
    {
        return $this->hasMany(Breed::class);
    }

    // relationship between species and animals
    public function animals()
    {
        return $this->hasManyThrough(Animal::class, Breed::class);
    }

}
