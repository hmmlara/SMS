<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerviousWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pervious_works', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_personal_id');
            $table->foreign('student_personal_id')
                ->references('id')
                ->on('student_personals')
                ->onDelete('cascade');

            $table->string('previous_position')->nullable();
            $table->string('previous_company_name')->nullable();
            $table->date('previous_company_start_date')->nullable();
            $table->date('previous_company_end_date')->nullable();

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
        Schema::dropIfExists('pervious_works');
    }
}
