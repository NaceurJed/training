<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTableEntrainements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_table_entrainements', function (Blueprint $table) {
            $table->timestamps();
            $table->foreignId('competiteur_id')->constrained('competiteurs')->onDelete('cascade');
            $table->foreignId('exercice_id')->constrained('exercices')->onDelete('cascade');
            $table->integer('serie');
            $table->integer('temps_serie');
            $table->integer('temps_repos');
            $table->integer('repetition_serie');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_table_entrainements');
    }
}
