<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rollbacknullsociete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('societes', function (Blueprint $table) {
            $table->string('activite')->nullable()->change();
            $table->string('telephone1')->nullable()->change();
            $table->string('telephone2')->nullable()->change();
            $table->string('adresse')->nullable()->change();
            $table->string('interlocuteur')->nullable()->change();
            $table->string('remarque')->nullable()->change();
            $table->string('tStarts')->change();
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
