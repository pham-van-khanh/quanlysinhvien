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
        Schema::create('student_subject', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id')->unsigned();
            $table->foreign('student_id')
                ->references('id')
                ->on('students')->onDelete('cascade');

            $table->unsignedBigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects')->onDelete('cascade');

            $table->float('mark');

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
        Schema::dropIfExists('student__subjects');
    }
};
