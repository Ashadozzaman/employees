<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

class EmployeeInfo extends Model
{
    use HasFactory;

    protected $fillable = ['birthday','address','employee_id'];
    public function employee(){
    	return $this->belongsTo('App\Models\Employee');    	
    }
}
