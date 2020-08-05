<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');

            $table->string('transplant_price');
            $table->string('travellers_count');
            $table->string('hospital_days_count');
            $table->string('days_outside_count');
            $table->string('total_days_count');

            $table->text('introduction');
            $table->text('cost');
            $table->text('featured_image');
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
        Schema::dropIfExists('treatments');
    }
}
