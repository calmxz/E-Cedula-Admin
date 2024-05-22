<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Carbon\Carbon;

class Individuals extends Model
{
    protected $connection = 'mongodb'; //OPTIONAL

    protected $fillable = [
        'FirstName',
        'MiddleName',
        'LastName',
        'ExtensionName',
        'Sex',
        'Region',
        'Province',
        'Municipality',
        'DateOfBirth',
        'PlaceOfBirth',
        'CivilStatus',
        'Citizenship',
        'ICRNo',
        'Height',
        'Weight',
        'Employed',
        'TIN',
        'profession',
        'GrossEarnings',
        'taxableAmount',
        'basicCommunityTax',
        'communityTaxDue',
        'Total',
        'Interest',
        'TotalAmountPaid',
        'paymentMethod',
        'paymentReferenceNumber',
        'ticketNumber',
    ];
    protected $dates = [
        'DateCreated',
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
