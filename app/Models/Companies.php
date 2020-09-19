<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use Eloquent;
// use App\Models\Employee;
class Companies extends Model
{
    use HasFactory;

    protected $fillable = ['company_name','address'];
     public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
