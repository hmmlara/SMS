<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('description_invoices', function (Blueprint $table) {
            //
            $table->id();

            $table->unsignedInteger('description_id');
            $table->foreign('description_id')
                ->references('id')
                ->on('descriptions')
                ->onDelete('cascade');

            $table->unsignedInteger('invoice_id');
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');

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
        Schema::dropIfExists('description_invoices');
    }
}
