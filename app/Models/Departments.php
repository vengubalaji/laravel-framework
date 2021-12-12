<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    protected $hidden = ['status'];
    protected $fillable = ['name','desc'];

    public function headofdepartment()
    {
        return $this->hasOne('App\Models\HeadOfDepartment');
    }
}
