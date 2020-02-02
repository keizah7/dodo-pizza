<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('email', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->text('comment');
            $table->boolean('delivery')->default(false);
            $table->unsignedBigInteger('pickup_id')->nullable();
            $table->timestamps();

            $table->foreign('pickup_id')->references('id')->on('pickups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
