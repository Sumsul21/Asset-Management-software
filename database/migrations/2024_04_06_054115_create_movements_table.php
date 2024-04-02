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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->date('mov_date')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('asset_transections_id');
            $table->foreign('asset_transections_id')->references('id')->on('asset_transections')->onDelete('cascade');
            $table->unsignedBigInteger('departments_id');
            $table->foreign('departments_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('locations_id');
            $table->foreign('locations_id')->references('id')->on('dep_locations')->onDelete('cascade');
            $table->unsignedBigInteger('asset_details_id');
            $table->foreign('asset_details_id')->references('id')->on('asset_details')->onDelete('cascade');
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('status')->default(true);
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
        Schema::dropIfExists('movements');
    }
};
