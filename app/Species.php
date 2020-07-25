<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
