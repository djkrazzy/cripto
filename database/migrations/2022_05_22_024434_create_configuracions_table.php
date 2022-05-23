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
        Schema::create('configuracions', function (Blueprint $table) {
            $table->id();
            $table->string('numero_cuenta_banco')->nullable();
            $table->string('banco')->nullable();
            $table->string('bitcoin')->nullable();
            $table->string('logo')->nullable();
            $table->string('whatsasapp')->nullable();
            $table->string('facebook')->nullable();
            $table->longText('frente_pagina')->nullable();
            $table->longText('frente_pagina2')->nullable();
            $table->longText('frente_pagina3')->nullable();
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
        Schema::dropIfExists('configuracions');
    }
};
