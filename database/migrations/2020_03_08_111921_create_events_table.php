<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_booked')->default(false);
            $table->unsignedInteger('entry_id')->nullable();
            $table->string('name');
            $table->string('title');
            $table->string('NumberOfPeople');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('color', 7);
            $table->string('email')->nullable();
            $table->string('phone',25);
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
