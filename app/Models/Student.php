<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['roll_no','name','email','gender','year','department_id','address','visitor'];
    
    public function certificates()
    {
        return $this->hasMany('App\Models\Certificates');
    }
}
