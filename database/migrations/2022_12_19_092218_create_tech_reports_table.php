<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_reports', function (Blueprint $table) {
            $table->id();
            $table->string('tsrf_no')->unique();
            $table->unsignedBigInteger('reference_id');
            $table->unsignedBigInteger('department_id');
            $table->string('reported_by');
            $table->date('date_reported');
            $table->string('problem_reported')->nullable();
            $table->string('equipment_no')->nullable();
            $table->string('date_purchased')->nullable();
            $table->string('findings');
            $table->string('work_done');
            $table->string('user_signed');
            $table->unsignedBigInteger('tod');
            $table->date('date_signed');
            $table->unsignedBigInteger('encoded_by');
            $table->boolean('is_charge')->default(false);
            $table->timestamps();
            $table->foreign('reference_id')->references('id')->on('tech_references')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('tod')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('encoded_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tech_reports');
    }
}
