<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment');
            $table->decimal('rate');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')
            ->on('courses');

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
        Schema::dropIfExists('reviews');
    }
}
