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
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->enum('operacion',['deposito','retiro']); 
            $table->enum('tipo',['deposito','bitcoin']);
            $table->float('monto')->comment('monto de la transaccion');
            $table->string('numero');
            $table->string('boleta')->nullable(); 
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cuenta_id');
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cuenta_id')->references('id')->on('cuentas');
            $table->enum('status',['pendiente','aprobado','cancelado'])->default('pendiente');
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
        Schema::dropIfExists('transaccions');
    }
};
