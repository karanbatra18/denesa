<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id')
              ->constrained()
              ->onDelete('cascade');
            $table->foreignId('category_id')
              ->constrained()
              ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('experience')->nullable();
            $table->string('qualification')->nullable();
            $table->text('speciality')->nullable();
            $table->text('about')->nullable();
            $table->text('specialization')->nullable();
            $table->text('list_of_awards')->nullable();
            $table->text('work_experience')->nullable();
            $table->text('education_training')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();

            $table->string('location', 255)->nullable();
            $table->string('image', 400)->nullable();
            $table->string('slug')->nullable();
            $table->string('zip_code')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
