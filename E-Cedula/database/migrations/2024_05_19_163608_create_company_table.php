<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $collection) {
            $collection->string('ccc2024_no');
            $collection->timestamp('date_created');
            $collection->string('company_name');
            $collection->string('barangay');
            $collection->string('municipality');
            $collection->string('province');
            $collection->string('kind_of_organization');
            $collection->string('kind_nature_of_business');
            $collection->string('place_of_registration');
            $collection->date('date_of_registration');
            $collection->integer('region');
            $collection->string('province');
            $collection->string('municipality');
            $collection->string('tin_no')->nullable();
            $collection->decimal('gross_receipt', 15, 2);
            $collection->decimal('total_community_tax_due', 15, 2);
            $collection->decimal('interest', 15, 2);
            $collection->decimal('total_amount_paid', 15, 2);
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
        Schema::dropIfExists('companies');
    }
}
