<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('report_id');
            $table->string('account_to_charge')->nullable();
            $table->string('requisition_no')->nullable();
            $table->string('charge_receipt_no')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();

            $table->foreign('report_id')->references('id')->on('tech_reports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_charges');
    }
}
