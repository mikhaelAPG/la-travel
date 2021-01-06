<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_gallery', function (Blueprint $table) {
            $table->string('title');
            $table->string('name');
            $table->string('gallery');
            $table->timestamps();
        });

        Schema::table('files_gallery', function (Blueprint $table) {
            $table->primary(['title','name']);
            $table->foreign('title')
			->references('title')
			->on('files')
			->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files_gallery');
    }
}
