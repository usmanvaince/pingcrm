<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{

    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->string('email', 50)->nullable();
            $table->string('ssn', 50)->nullable();
            $table->string('status', 10)->default('active');
            $table->string('preferred_communication_method', 25)->default('phone');
            $table->string('account_number', 50)->nullable();
            $table->string('date_of_death', 20)->nullable();
            $table->string('last_seen_date')->nullable();


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
