<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('description_payments', function (Blueprint $table) {
            //
            $table->id();

            $table->unsignedBigInteger('description_id');
            $table->foreign('description_id')
                ->references('id')
                ->on('descriptions')
                ->onDelete('cascade');

            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')
                ->references('id')
                ->on('payments')
                ->onDelete('cascade');

            $table->decimal('units');

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
        Schema::dropIfExists('description_payments');
    }
}
