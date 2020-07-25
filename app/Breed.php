<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public function species()
    {
        return $this->hasOne(Species::class, 'id', 'species_id');
    }
}
