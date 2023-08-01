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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->integer('title');
            $table->string('description');
            $table->unsignedBigInteger('assignee_id'); //para acidionar fk
            $table->dateTime('due_date');
            $table->timestamps();



            $table->foreign('assignee_id')->references('id')->on('funcionarios');//referenciando a fk
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
