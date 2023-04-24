<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_personals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academic_id');
            $table->foreign('academic_id')
                ->references('id')
                ->on('academics')
                ->onDelete('cascade');

            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade');

            $table->string('name');
            $table->string('nrc');
            $table->date('dob');
            $table->string('email');
            $table->string('phone');
            $table->string('fb_link');
            $table->longText('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('race');
            $table->string('martial_status');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('highest_education');
            $table->string('hight_school_name');
            $table->enum('working_experience_status', ['Yes', 'No'])->default('No');
            $table->string('nrc_file');
            $table->string('graducation_certificate')->nullable();
            $table->string('other_document')->nullable();
            $table->longText('description');
            $table->enum('terms_and_conditions', ['Yes', 'No']);
            $table->enum('status', ['Confirm', 'Cancel']);

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
        Schema::dropIfExists('student_personals');
    }
}
