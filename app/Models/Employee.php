<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employeeNumber';

    public function office()
    {
        return $this->belongsTo(Office::class, 'officeCode');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'salesrepemployeenumber', 'employeeNumber');
    }
}
