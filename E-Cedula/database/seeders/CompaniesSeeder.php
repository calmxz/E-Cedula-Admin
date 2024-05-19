<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'ccc2024_no' => '14493021',
            'date_created' => '2021-11-17T03:19:56.186Z',
            'company_name' => 'BNG Transmedia Services Inc.',
            'barangay' => 'Ili Norte',
            'municipality' => 'San Juan',
            'province' => 'La Union',
            'kind_of_organization' => 'Corporation',
            'kind_nature_of_business' => 'Computer Software Services',
            'place_of_registration' => 'San Juan',
            'date_of_registration' => '2011-06-02',
            'region' => 1,
            'province' => 'La Union',
            'municipality' => 'San Juan',
            'tin_no' => '1234570000000',
            'gross_receipt' => 2775765.20,
            'total_community_tax_due' => 1110.00,
            'interest' => 0.00,
            'total_amount_paid' => 1110.00,
    ]);

        Company::create([
                'ccc2024_no' => '14493022',
                'date_created' => '2021-11-17T03:19:56.186Z',
                'company_name' => 'ABC Corporation',
                'barangay' => 'Barangay 1',
                'municipality' => 'San Juan',
                'province' => 'La Union',
                'kind_of_organization' => 'Corporation',
                'kind_nature_of_business' => 'Retail',
                'place_of_registration' => 'Manila',
                'date_of_registration' => '2010-05-15',
                'region' => 1,
                'province' => 'La Union',
                'municipality' => 'San Juan',
                'tin_no' => '1234570000001',
                'gross_receipt' => 1000000.00,
                'total_community_tax_due' => 500.00,
                'interest' => 0.00,
                'total_amount_paid' => 500.00,
        ]);

        Company::create([
                'ccc2024_no' => '14493023',
                'date_created' => '2021-11-17T03:19:56.186Z',
                'company_name' => 'XYZ Enterprises',
                'barangay' => 'Barangay 2',
                'municipality' => 'San Fernando',
                'province' => 'La Union',
                'kind_of_organization' => 'Sole Proprietorship',
                'kind_nature_of_business' => 'Consulting',
                'place_of_registration' => 'San Fernando',
                'date_of_registration' => '2012-08-20',
                'region' => 1,
                'province' => 'La Union',
                'municipality' => 'San Fernando ',
                'tin_no' => '1234570000002',
                'gross_receipt' => 1500000.00,
                'total_community_tax_due' => 750.00,
                'interest' => 0.00,
                'total_amount_paid' => 750.00,
        ]);

        Company::create([
                'ccc2024_no' => '14493024',
                'date_created' => '2021-11-17T03:19:56.186Z',
                'company_name' => 'DEF Industries',
                'barangay' => 'Barangay 3',
                'municipality' => 'San Fernando',
                'province' => 'la Union',
                'kind_of_organization' => 'Partnership',
                'kind_nature_of_business' => 'Manufacturing',
                'place_of_registration' => 'San Fernando',
                'date_of_registration' => '2015-03-10',
                'region' => 1,
                'province' => 'La Union',
                'municipality' => 'San Fernando',
                'tin_no' => '1234570000003',
                'gross_receipt' => 2000000.00,
                'total_community_tax_due' => 1000.00,
                'interest' => 0.00,
                'total_amount_paid' => 1000.00,
        ]);

        Company::create([
            'ccc2024_no' => '14493025',
            'date_created' => '2021-11-17T03:19:56.186Z',
            'company_name' => 'GHI Corporation',
            'barangay' => 'Barangay 4',
            'municipality' => 'San Fernando',
            'province' => 'La Union',
            'kind_of_organization' => 'Corporation',
            'kind_nature_of_business' => 'Technology',
            'place_of_registration' => 'San Fernando',
            'date_of_registration' => '2018-11-05',
            'region' => 1,
            'province' => 'La Union',
            'municipality' => 'San Fernando',
            'tin_no' => '1234570000004',
            'gross_receipt' => 2500000.00,
            'total_community_tax_due' => 1250.00,
            'interest' => 0.00,
            'total_amount_paid' => 1250.00,
        ]);
    }
}