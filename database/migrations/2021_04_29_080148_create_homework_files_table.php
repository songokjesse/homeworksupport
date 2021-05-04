<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework_files', function (Blueprint $table) {
            $table->id();
            $table->string('filePath');
            $table->string('OriginalName');
            $table->integer('fileSize');
            $table->bigInteger('homework_id')->unsigned();
            $table->foreign('homework_id')->references('id')->on('homework');
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
        Schema::dropIfExists('homework_files');
    }
}
