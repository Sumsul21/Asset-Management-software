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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('sup_name')->nullable();
            $table->string('supplier_phNumber')->nullable();
            $table->text('supplier_address')->nullable();
            $table->text('email')->nullable();
            $table->text('fax')->nullable();
            $table->text('web_address')->nullable();
            $table->text('contact_perName')->nullable();
            $table->string('contact_phNumber')->nullable();
            $table->string('designation')->nullable();
            $table->integer('credit_limit')->nullable();

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
        Schema::dropIfExists('suppliers');
    }
};
