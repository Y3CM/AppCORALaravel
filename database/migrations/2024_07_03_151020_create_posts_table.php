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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('author',15);
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('resumen');
            $table->text('content');
            $table->string('image');
            $table->string('category');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
            $table->foreign('author')->references('number_document')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
};
