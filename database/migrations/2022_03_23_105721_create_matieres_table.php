<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->integer('code_matiere');
            $table->string('nom_matiere');
            $table->float('coefficient');
            $table->unsignedBigInteger('nombre_heure');

            $table->unsignedBigInteger('specialite_id');
            $table->foreign('specialite_id')->references('id')->on('specialites')->cascadeOnDelete(); 

            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules')->cascadeOnDelete(); 

            $table->unsignedBigInteger('niveau_etude_id');
            $table->foreign('niveau_etude_id')->references('id')->on('niveau_etudes')->cascadeOnDelete(); 

            $table->unsignedBigInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')->cascadeOnDelete(); 

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matieres');
    }
}
