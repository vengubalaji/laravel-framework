<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professors extends Model
{
    use HasFactory;
    public function professorprofile()
    {
        return $this->hasOne('App\Models\ProfessorProfile');
    }
}
