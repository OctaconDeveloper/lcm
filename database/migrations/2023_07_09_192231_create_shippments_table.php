<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippments', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->TEXT('description');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('start_unit');
            $table->unsignedBigInteger('end_unit');
            $table->integer('quantity');
            $table->JSON('routes');
            $table->unsignedBigInteger('sending_officer_id');
            $table->boolean('is_scheduled', false);
            $table->dateTime('send_date');
            $table->dateTime('proposed_delivery_date');
            $table->dateTime('delivered_date')->nullable();
            $table->unsignedBigInteger('receiving_officer_id')->nullable();
            $table->enum('status',['pending','processing','delivered','rejected']);
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
        Schema::dropIfExists('shippments');
    }
}
