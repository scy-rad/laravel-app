<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('games', function (Blueprint $table) {
            $table->string('title',50)->change();
            $table->dropColumn(['score']);
            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //composer require doctrine/dbal
        //pakiet potrzebny, żeby laravel potrafił modyfikować tabele
        Schema::table('games', function (Blueprint $table) {
            $table->string('title',100)->change();
            $table->float('score')->nullable();
            $table->dropIndex('games_title_index');
        });
    }
}
