<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individuals', function (Blueprint $collection) {
            $collection->string('CCI2024No');
            $collection->timestamp('DateCreated');
            $collection->string('LastName');
            $collection->string('MiddleName');
            $collection->string('FirstName');
            $collection->string('ExtensionName')->nullable();
            $collection->string('Sex');
            $collection->string('Region');
            $collection->string('Province');
            $collection->string('Municipality');
            $collection->date('DateOfBirth');
            $collection->string('PlaceOfBirth');
            $collection->string('CivilStatus');
            $collection->string('Citizenship');
            $collection->string('ICRNo')->nullable();
            $collection->string('HeightInFt');
            $collection->integer('WeightInKg');
            $collection->string('AreYouEmployed');
            $collection->string('TINNo')->nullable();
            $collection->string('ProfessionOccupationBusiness');
            $collection->decimal('SalariesOrGrossReceipt', 10, 2);
            $collection->integer('TotalCommunityTaxDue');
            $collection->decimal('Interest', 5, 2);
            $collection->decimal('TotalAmountPaid', 10, 2);
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individuals');
    }
}
