<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order__items', function (Blueprint $table) {
            $table->string('sid')->unique();
            $table->string('name');
            $table->float('price');
            $table->integer('quantity');
            $table->float('weight')->nullable();
            $table->float('discount')->nullable();
            $table->float('tax')->nullable();
            $table->string('order_id')->nullable();

            $table->foreign('order_id')->references('sid')->on('order__details')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order__items', function (Blueprint $table) {
            $table->dropColumn('sid');
            $table->dropColumn('name');
            $table->dropColumn('price');
            $table->dropColumn('quantity');
            $table->dropColumn('weight');
            $table->dropColumn('discount');
            $table->dropColumn('tax');
            $table->dropColumn('order_id');
        });
    }
};
