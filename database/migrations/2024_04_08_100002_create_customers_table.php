<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('customers')) {
            Schema::create('customers', function (Blueprint $table) {
                $table->increments('customerNumber')->unsigned();
                $table->string('customerName', 50);
                $table->string('contactLastName', 50);
                $table->string('contactFirstName', 50);
                $table->string('phone', 50);
                $table->string('addressLine1', 50);
                $table->string('addressLine2', 50)->nullable();
                $table->string('city', 50);
                $table->string('state', 50)->nullable();
                $table->string('postalCode', 15)->nullable();
                $table->string('country', 50);
                $table->unsignedInteger('salesrepemployeenumber')->nullable();
                $table->decimal('creditLimit', 10)->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
