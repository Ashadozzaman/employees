<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use Eloquent;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','companyId'];
    public function company()
    {
        return $this->belongsTo('App\Models\Companies');
    }
    public function employeeInfo(){
    	return $this->hasMany('App\Models\EmployeeInfo');
    }
}
