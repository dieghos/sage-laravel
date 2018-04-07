<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCopToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->string('grado');
        $table->string('apellido');
        $table->string('nombres');
        $table->unsignedInteger('legajo');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('grado');
        $table->dropColumn('apellido');
        $table->dropColumn('nombres');
        $table->dropColumn('legajo');
      });
    }
}
