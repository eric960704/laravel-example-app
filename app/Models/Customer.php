<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customerNumber';

    protected $fillable = [
        'customerName',
        'contactLastName',
        'contactFirstName',
        'phone',
        'addressLine1',
        'addressLine2',
        'city',
        'state',
        'postalCode',
        'country',
        'salesrepemployeenumber',
        'creditLimit',
    ];

    protected $casts = [
        'creditLimit' => 'float',
    ];

    public function employee() 
    {
        return $this->belongsTo(Employee::class, 'salesrepemployeenumber');
    }
}
