<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Primeiro remover a foreign key constraint da tabela tickets
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['level_id']); // ajusta o nome se for diferente
            $table->dropColumn('level_id');
        });
        
        // Depois apagar a tabela levels
        Schema::dropIfExists('levels');
    }

    public function down()
    {
        // Recriar a tabela levels
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        
        // Recriar a foreign key na tabela tickets
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('level_id')->constrained();
        });
    }
};