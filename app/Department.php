<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * Setup relationships
     */
    // relationship between department and species
    public function species()
    {
        return $this->hasMany(Species::class, 'department_id', 'id');
    }
}
