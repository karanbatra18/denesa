<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_treatments', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('link')->nullable();
            $table->text('description')->nullable();
            $table->text('featured_image')->nullable();
            $table->text('icon_image')->nullable();
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
        Schema::dropIfExists('featured_treatments');
    }
}
