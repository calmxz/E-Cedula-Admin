<?php

namespace Database\Seeders;

use App\Models\Individuals;
use Illuminate\Database\Seeder;

class IndividualsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Individuals::create([
            'CCI2024No' => '14493021',
            'DateCreated' => '2021-11-17T03:19:56.186Z',
            'LastName' => 'Dela Cruz',
            'MiddleName' => 'Corazon',
            'FirstName' => 'Juan',
            'ExtensionName' => '',
            'Sex' => 'Male',
            'Region' => '1',
            'Province' => 'La Union',
            'Municipality' => 'San Juan',
            'DateOfBirth' => '2002-09-04',
            'PlaceOfBirth' => 'La Union',
            'CivilStatus' => 'Single',
            'Citizenship' => 'Filipino',
            'ICRNo' => '',
            'HeightInFt' => '5\'6"',
            'WeightInKg' => 58,
            'AreYouEmployed' => 'Yes',
            'TINNo' => '123456789',
            'ProfessionOccupationBusiness' => 'Teacher',
            'SalariesOrGrossReceipt' => 224000.00,
            'TotalCommunityTaxDue' => 229,
            'Interest' => 13.44,
            'TotalAmountPaid' => 242.44
        ]);

        // Add 4 more dummy entries here
        Individuals::create([
            'CCI2024No' => '14493022',
            'DateCreated' => '2021-11-18T04:20:57.187Z',
            'LastName' => 'Garcia',
            'MiddleName' => 'Santos',
            'FirstName' => 'Maria',
            'ExtensionName' => '',
            'Sex' => 'Female',
            'Region' => '1',
            'Province' => 'La Union',
            'Municipality' => 'San Fernando',
            'DateOfBirth' => '1995-07-21',
            'PlaceOfBirth' => 'La Union',
            'CivilStatus' => 'Married',
            'Citizenship' => 'Filipino',
            'ICRNo' => '',
            'HeightInFt' => '5\'4"',
            'WeightInKg' => 55,
            'AreYouEmployed' => 'No',
            'TINNo' => '987654321',
            'ProfessionOccupationBusiness' => 'Engineer',
            'SalariesOrGrossReceipt' => 300000.00,
            'TotalCommunityTaxDue' => 300,
            'Interest' => 15.50,
            'TotalAmountPaid' => 315.50
        ]);

        Individuals::create([
            'CCI2024No' => '14493023',
            'DateCreated' => '2021-11-19T05:21:58.188Z',
            'LastName' => 'Reyes',
            'MiddleName' => 'Martinez',
            'FirstName' => 'Carlos',
            'ExtensionName' => '',
            'Sex' => 'Male',
            'Region' => '1',
            'Province' => 'La Union',
            'Municipality' => 'Agoo',
            'DateOfBirth' => '1988-12-15',
            'PlaceOfBirth' => 'La Union',
            'CivilStatus' => 'Married',
            'Citizenship' => 'Filipino',
            'ICRNo' => '',
            'HeightInFt' => '5\'8"',
            'WeightInKg' => 70,
            'AreYouEmployed' => 'Yes',
            'TINNo' => '112233445',
            'ProfessionOccupationBusiness' => 'Doctor',
            'SalariesOrGrossReceipt' => 500000.00,
            'TotalCommunityTaxDue' => 500,
            'Interest' => 20.00,
            'TotalAmountPaid' => 520.00
        ]);

        Individuals::create([
            'CCI2024No' => '14493024',
            'DateCreated' => '2021-11-20T06:22:59.189Z',
            'LastName' => 'Santos',
            'MiddleName' => 'Lorenzo',
            'FirstName' => 'Ana',
            'ExtensionName' => '',
            'Sex' => 'Female',
            'Region' => '1',
            'Province' => 'La Union',
            'Municipality' => 'Bauang',
            'DateOfBirth' => '1975-03-30',
            'PlaceOfBirth' => 'La Union',
            'CivilStatus' => 'Single',
            'Citizenship' => 'Filipino',
            'ICRNo' => '',
            'HeightInFt' => '5\'5"',
            'WeightInKg' => 60,
            'AreYouEmployed' => 'No',
            'TINNo' => '223344556',
            'ProfessionOccupationBusiness' => 'Businesswoman',
            'SalariesOrGrossReceipt' => 150000.00,
            'TotalCommunityTaxDue' => 150,
            'Interest' => 10.00,
            'TotalAmountPaid' => 160.00
        ]);

        Individuals::create([
            'CCI2024No' => '14493025',
            'DateCreated' => '2021-11-21T07:23:60.190Z',
            'LastName' => 'Aquino',
            'MiddleName' => 'Cruz',
            'FirstName' => 'Pedro',
            'ExtensionName' => '',
            'Sex' => 'Male',
            'Region' => '1',
            'Province' => 'La Union',
            'Municipality' => 'Aringay',
            'DateOfBirth' => '1990-06-18',
            'PlaceOfBirth' => 'La Union',
            'CivilStatus' => 'Single',
            'Citizenship' => 'Filipino',
            'ICRNo' => '',
            'HeightInFt' => '6\'0"',
            'WeightInKg' => 80,
            'AreYouEmployed' => 'Yes',
            'TINNo' => '556677889',
            'ProfessionOccupationBusiness' => 'Architect',
            'SalariesOrGrossReceipt' => 400000.00,
            'TotalCommunityTaxDue' => 400,
            'Interest' => 18.00,
            'TotalAmountPaid' => 418.00
        ]);
    }
}
