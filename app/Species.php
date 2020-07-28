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
}
