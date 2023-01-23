<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecommendationToTechReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tech_reports', function (Blueprint $table) {
            //
            $table->string('recommendation')->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tech_reports', function (Blueprint $table) {
            //
            $table->dropColumn('recommendation');
        });
    }
}
