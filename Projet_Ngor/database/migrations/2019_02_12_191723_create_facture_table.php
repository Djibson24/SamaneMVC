<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mois');
            $table->double('consommation');
            $table->integer('prix');
            $table->boolean('reglement');
            $table->integer('abonnement_id')->unsigned();
            $table->foreign('abonnement_id')->references('id')->on('abonnement');
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
        Schema::dropIfExists('facture');
    }
}
