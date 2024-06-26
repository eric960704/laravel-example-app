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
        if (! Schema::hasTable('offices')) {
            Schema::create('offices', function (Blueprint $table) {
                $table->increments('officeCode')->unsigned();
                $table->string('city', 50);
                $table->string('phone', 50);
                $table->string('addressLine1', 50);
                $table->string('addressLine2', 50)->nullable();
                $table->string('state', 50)->nullable();
                $table->string('country', 50);
                $table->string('postalCode', 15);
                $table->string('territory', 10);
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
        Schema::dropIfExists('offices');
    }
};
