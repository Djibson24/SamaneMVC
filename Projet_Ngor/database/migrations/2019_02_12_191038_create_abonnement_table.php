<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonnementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contrat');
            $table->date('date');
            $table->double('cumulanc')->nullable();
            $table->double('cumulnouv');
            $table->integer('compteur_id')->unsigned();
            $table->foreign('compteur_id')->references('id')->on('compteur');
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
        Schema::dropIfExists('abonnement');
    }
}
