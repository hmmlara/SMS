<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_personal_id');
            $table->foreign('student_personal_id')
                ->references('id')
                ->on('student_personals')
                ->onDelete('cascade');

            $table->string('degree')->nullable();
            $table->string('uni_name')->nullable();
            $table->date('uni_start_date')->nullable();
            $table->date('uni_end_date')->nullable();

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
        Schema::dropIfExists('degrees');
    }
}
