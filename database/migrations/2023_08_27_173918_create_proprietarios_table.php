<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proprietarios', function (Blueprint $table) {
            $table->id();
            //id funcionario
            $table->string('nome');
            $table->string('email')->unique();
            $table->text('senha');
            $table->date('data_nascimento');
            $table->text('foto_perfil');
            $table->string('rua');
            $table->integer('numero');
            $table->string('cidade');
            $table->string('uf');
            $table->string('pais');
            $table->string('cep');
            $table->string('cpf')->unique();
            $table->string('telefone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietarios');
    }
};
