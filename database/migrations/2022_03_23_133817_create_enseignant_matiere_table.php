<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantMatiereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignant_matiere', function (Blueprint $table) {
            $table->id();$table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('matiere_id');

            $table->foreign('enseignant_id')->on('enseignants')->references('id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('matiere_id')->on('matieres')->references('id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('enseignant_matiere');
    }
}
