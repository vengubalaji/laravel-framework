<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['roll_no','name','email','gender','year','department_id','address','visitor'];
    use HasFactory;
}
