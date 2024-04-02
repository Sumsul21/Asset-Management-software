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
        Schema::create('depreciations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('duration')->nullable();
            $table->decimal('percentage')->nullable();
            $table->integer('life_time')->nullable();
            $table->tinyInteger('auto_cal')->default(true);
            $table->tinyInteger('status')->default(true);
            $table->tinyInteger('is_delete')->default(false);

            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depreciations');
    }
};
