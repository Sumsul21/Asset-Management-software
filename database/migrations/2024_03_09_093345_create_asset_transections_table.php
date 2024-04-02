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
        Schema::create('asset_transections', function (Blueprint $table) {
            $table->id();
            $table->string('rfid_num')->nullable();
            $table->string('asset_code')->nullable();
            $table->string('book_value')->nullable();
            $table->string('org_value')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('part_no')->nullable();

            $table->unsignedBigInteger('asset_details_id');
            $table->foreign('asset_details_id')->references('id')->on('asset_details')->onDelete('cascade');
            $table->unsignedBigInteger('dep_id');
            $table->foreign('dep_id')->references('id')->on('depreciations')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('asset_transections');
    }
};
