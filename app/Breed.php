<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = ['breed', 'species_id'];

    /**
     * Setup relationships
     */
    // relationship between breeds and species
    public function species()
    {
        return $this->hasOne(Species::class, 'id', 'species_id');
    }
}
