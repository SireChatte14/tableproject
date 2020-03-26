<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->integer('NumberOfPeople');
            $table->string('bookingdate');
            $table->string('fromtime');
            $table->string('LengthOfStay');
            $table->string('endTime');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->text('message')->nullable();
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
        Schema::dropIfExists('entrys');
    }
}
