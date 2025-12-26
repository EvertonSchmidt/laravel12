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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); //int
            $table->string('nome'); //string
            $table->string('email'); //string
            $table->string('telefone'); //string
            $table->string('permissao'); //string
            // $table->date('nascimento'); //date 1989-22-05
            // $table->datetime('data'); //datetime 1989-22-05 17:05:07
            // $table->float('valor'); //float 25.50
            // $table->double('preco'); //double 25.50
            // $table->decimal('taxa', 8,2); //decimal
            // $table->integer('idade'); //int 77
            // $table->bigInteger('saldo'); // int 777
            // $table->boolean('ativo'); // boolean true or false
            // $table->text('desc'); // text texto longo
            // $table->longText('desc'); // texto mais longo (Exemplo, portal de notícia para descrição da página tipo: posts)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
