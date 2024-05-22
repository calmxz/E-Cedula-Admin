<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Carbon\Carbon;


class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'barangay', 
        'municipality', 
        'province', 
        'kind_of_organization', 
        'nature_of_business', 
        'place_of_registration', 
        'date_of_registration', 
        'region', 
        'tin', 
        'gross_receipt', 
        'total_amount_paid',
        'date_created',
    ];

    protected $dates = [
        'date_created',
    ];

    // Accessor for backward compatibility
    public function getDateCreatedAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getTotalAmountPaidAttribute($value)
    {
        return $value;
    }
}