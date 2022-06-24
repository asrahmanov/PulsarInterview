<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            $table->date('report_day')->nullable();
            $table->string('launch_plan')->nullable();
            $table->bigInteger('launch_fact')->unsigned();
            $table->bigInteger('fact_of_transfer_to_otk')->unsigned();
            $table->bigInteger('fact_of_transfer_to_warehouse')->unsigned();
            $table->bigInteger('launch_previously')->unsigned();
            $table->bigInteger('plan_of_transfer_to_otk')->unsigned();
            $table->bigInteger('launch_plan_ssz')->unsigned(); // план запуска по ССЗ
            $table->softDeletes();
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
        Schema::dropIfExists('report');
    }
}
