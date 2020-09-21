<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEmploye extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employes', function (Blueprint $table) {
            $table->string('prenom')->nullable();
            $table->string('telephone1');
            $table->string('telephone2')->nullable();
            $table->string('email')->nullable();
            $table->string('adresse');
            $table->date('birthdate')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('sexe')->nullable();
            $table->string('situation')->nullable();
            $table->string('raison')->nullable();
            $table->integer('etatcovid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
