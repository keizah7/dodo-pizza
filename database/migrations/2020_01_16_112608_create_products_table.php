<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('size_title', 255);
            $table->text('description');
            $table->decimal('price', 5, 2);
            $table->decimal('discount', 5, 2)->nullable();
            $table->string('photo', 255)->nullable();
            $table->smallInteger('priority');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('group_id');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
