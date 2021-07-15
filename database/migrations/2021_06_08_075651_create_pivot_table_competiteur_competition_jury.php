<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTableCompetiteurCompetitionJury extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_table_competiteur_competition_jury', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competiteur_id')->constrained('competiteurs')->onDelete('cascade');
            $table->foreignId('competition_id')->constrained('competitions')->onDelete('cascade');
            $table->foreignId('jury_id')->constrained('juries')->onDelete('cascade');
            $table->integer('repet_total');
            $table->integer('temps_travail');
            $table->integer('temps_repos');
            $table->integer('score');
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
        Schema::dropIfExists('pivot_table_competiteur_competition_jury');
    }
}
