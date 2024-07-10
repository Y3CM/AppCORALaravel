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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->foreignId('product_id')->constrained('products')->ondelete('cascade')->onUpdate('cascade');
            $table->string('review');
            $table->string('rating');
            $table->timestamps();
            $table->foreign('user_id')->references('number_document')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**  
    //  * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
