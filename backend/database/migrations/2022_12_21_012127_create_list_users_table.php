<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_users', function (Blueprint $table) {
            $table->id(); 
            $table->string('cep');
            $table->string('estado');
            $table->string('cidade');
            $table->string('endereco');
            $table->string('numero');
            $table->string('nome_contato');
            $table->string('email_contato');
            $table->string('telefone_contato');
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
        Schema::dropIfExists('list_users');
    }
}
