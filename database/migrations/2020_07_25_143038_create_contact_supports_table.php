<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_supports', function (Blueprint $table) {
            $table->id();

            $table->text('support_text')->nullable();
            $table->text('support_browse_text')->nullable();
            $table->text('support_email_id')->nullable();
            $table->text('support_link')->nullable();
            $table->text('support_whatsapp')->nullable();
            $table->text('support_email')->nullable();
            $table->text('support_call')->nullable();

            $table->text('general_text')->nullable();
            $table->text('general_browse_text')->nullable();
            $table->text('general_email_id')->nullable();
            $table->text('general_link')->nullable();
            $table->text('general_whatsapp')->nullable();
            $table->text('general_email')->nullable();
            $table->text('general_call')->nullable();

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
        Schema::dropIfExists('contact_supports');
    }
}
