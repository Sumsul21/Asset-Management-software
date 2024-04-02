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
        Schema::create('allocations', function (Blueprint $table) {
            $table->id();
            $table->date('sang_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('status')->default(true);
            $table->string('remarks')->nullable();
            $table->string('dept_id')->nullable();
            $table->string('loc_id')->nullable();
            $table->unsignedBigInteger('asset_transections_id');
            $table->foreign('asset_transections_id')->references('id')->on('asset_transections')->onDelete('cascade');
            $table->unsignedBigInteger('employees_id');
            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('allocations');
    }
};
