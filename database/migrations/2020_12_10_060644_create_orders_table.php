<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('members')->onDelete('cascade');
            $table->unsignedInteger('buyer_id');
            $table->foreign('buyer_id')->references('id')->on('members')->onDelete('cascade');
            $table->unsignedInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->string('name');
            $table->integer('quantity');
            $table->integer('money');
            $table->dateTime('time');
            $table->string('status');
            $table->string('address');
            $table->string('way');
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
        Schema::dropIfExists('orders');
    }
}
