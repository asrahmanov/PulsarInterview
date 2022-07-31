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
        Schema::create('worksheets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->default(1);
            $table->bigInteger('company_id')->unsigned()->default(1);
            $table->string('name');
            $table->text('form_questions');
            $table->text('form_answers');
            $table->enum('status', array('new','close'))->nullable();
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
