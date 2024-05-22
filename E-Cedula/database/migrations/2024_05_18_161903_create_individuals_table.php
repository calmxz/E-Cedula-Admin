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
            $collection->string('MiddleName')->nullable();
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
            $collection->string('Height');
            $collection->integer('Weight')->nullable();
            $collection->string('Employed');
            $collection->string('profession');
            $collection->string('TIN')->nullable();
            $collection->decimal('GrossEarnings', 10, 2);
            $collection->string('validId');
            $collection->decimal('taxableAmount', 10, 2);
            $collection->decimal('basicCommunityTax', 10, 2);
            $collection->integer('communityTaxDue');
            $collection->decimal('Total', 10, 2);
            $collection->decimal('Interest', 5, 2);
            $collection->decimal('TotalAmountPaid', 10, 2);
            $collection->string('paymentMethod');
            $collection->string('paymentReferenceNumber');
            $collection->integer('ticketNumber');
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
