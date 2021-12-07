<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorProfile extends Model
{
    use HasFactory;

    public function professors()
    {
        return $this->belongsTo('App\Models\Professors');
    }
}
