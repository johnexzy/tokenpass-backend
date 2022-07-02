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
        Schema::create('token_requirements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('gate_id');
            $table->integer('token_id')->nullable();
            $table->integer('amount_required')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('token_requirements');
    }
};
