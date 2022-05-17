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
        Schema::create('referencias', function (Blueprint $table) {
            $table->id();
            $table->string('photo_dpi_front', 2048)->nullable();
            $table->string('photo_dpi_back', 2048)->nullable();
            $table->string('photo_recibo', 2048)->nullable();
            $table->string('photo_selfie', 2048)->nullable();
            $table->string('numero_cuenta_banco')->nullable();
            $table->string('banco')->nullable();
            $table->string('bitcoin')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name_emergency')->nullable();
            $table->string('tel_emergency')->nullable();
            $table->enum('status',['pendiente','aprobado'])->default('pendiente');
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
        Schema::dropIfExists('referencias');
    }
};
