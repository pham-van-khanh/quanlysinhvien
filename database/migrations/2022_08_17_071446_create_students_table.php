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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('faculty_id')->unsigned();
            $table->foreign('faculty_id')
                ->references('id')
                ->on('faculties')->onDelete('cascade');
            $table->string('name',30);
            $table->string('email',30);
            $table->string('avatar');
            $table->string('phone',15);
            $table->date('birthday');
            $table->string('address');
            $table->tinyInteger('gender');
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
        Schema::dropIfExists('students');
    }
};
