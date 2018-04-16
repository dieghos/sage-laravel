<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('description');
            $table->string('comments')->nullable();
            $table->string('state')->default('Ingresado');
            $table->string('etx')->nullable();
            $table->date('time_limit')->nullable();
            $table->timestamps();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('document_file', function (Blueprint $table) {
            $table->integer('file_id')->unsigned();
            $table->integer('document_id')->unsigned();

            $table->foreign('file_id')
                  ->references('id')
                  ->on('files')
                  ->onDelete('cascade');

            $table->foreign('document_id')
                  ->references('id')
                  ->on('documents')
                  ->onDelete('cascade');

            $table->primary(['file_id','document_id']);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_file');
        Schema::dropIfExists('files');
        Schema::dropIfExists('documents');
    }
}
