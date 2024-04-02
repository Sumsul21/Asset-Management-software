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
        Schema::create('asset_details', function (Blueprint $table) {
            $table->id();
            $table->string('asset_code')->nullable();
            $table->string('initial')->nullable();
            $table->string('code_length')->nullable();
            $table->string('asset_name')->nullable();
            $table->string('part_no')->nullable();
            $table->text('description')->nullable();
            // $table->tinyInteger('status')->default(true);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('ast_grp_id');
            $table->foreign('ast_grp_id')->references('id')->on('asset_groups')->onDelete('cascade');
            $table->unsignedBigInteger('ast_typ_id');
            $table->foreign('ast_typ_id')->references('id')->on('asset_types')->onDelete('cascade');
            $table->unsignedBigInteger('dep_id');
            $table->foreign('dep_id')->references('id')->on('depreciations')->onDelete('cascade');
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
        Schema::dropIfExists('asset_details');
    }
};
