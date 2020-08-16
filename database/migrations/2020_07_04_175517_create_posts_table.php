<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->string('slug')->unique();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('featured_image')->nullable();
            $table->enum('status', ['publish','draft'])->nullable()->default('publish');
            $table->text('meta_title')->nullable();
            $table->tinyInteger('is_featured')->default(0);
            $table->text('meta_description')->nullable();
            $table->dateTime('published_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
