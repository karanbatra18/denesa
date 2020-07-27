<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('team_specialities')->nullable();
            $table->text('speciality')->nullable();
            $table->text('established ')->nullable();
            $table->text('infrastructure')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();
            $table->text('address')->nullable();
            $table->string('image', 400)->nullable();
            $table->string('featured_image', 400)->nullable();
            $table->string('zip_code')->nullable();
            $table->string('slug')->nullable();
            $table->text('confirm_during_stay')->nullable();
            $table->text('money_matters')->nullable();
            $table->text('food')->nullable();
            $table->text('treatment_related')->nullable();
            $table->text('languauge')->nullable();
            $table->text('transportation')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitals');
    }
}
