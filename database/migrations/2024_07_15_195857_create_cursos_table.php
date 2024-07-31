<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->integer('duracao');
            $table->decimal('preco', 10, 2);
            $table->string('imagem')->nullable(); // Caminho para a imagem do curso
            $table->unsignedBigInteger('user_id'); // Adiciona a coluna user_id
            $table->timestamps();

            // Adiciona a chave estrangeira referenciando a tabela users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        Schema::dropIfExists('cursos');
    }
}