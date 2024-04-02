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
        Schema::create('asset_repairs', function (Blueprint $table) {
            $table->id();
            $table->date('repair_date')->nullable();
            $table->string('repair_amount')->nullable();
            $table->text('repair_details')->nullable();
            $table->tinyInteger('status')->default(true);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('asset_transactions_id');
            $table->foreign('asset_transactions_id')->references('id')->on('asset_transections')->onDelete('cascade');
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
        Schema::dropIfExists('asset_repairs');
    }
};
