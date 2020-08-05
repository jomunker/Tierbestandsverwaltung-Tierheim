<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $fillable = ['species', 'department_id'];

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function breeds()
    {
        return $this->hasMany(Breed::class);
    }
    
    public function animals()
    {
        return $this->hasManyThrough(Animal::class, Breed::class);
    }
}
