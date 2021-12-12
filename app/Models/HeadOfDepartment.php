<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadOfDepartment extends Model
{
    use HasFactory;

    protected $hidden = ['departments_id', 'email_verified_at', 'status','created_at','updated_at'];

    public function departments()
    {
        return $this->belongsTo('App\Models\Departments');
    }
}
