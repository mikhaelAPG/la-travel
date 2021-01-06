<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_contact', function (Blueprint $table) {
            $table->string('title');
            $table->string('phone',15);
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('pinterest')->nullable();
            $table->timestamps();
        });

        Schema::table('files_contact', function (Blueprint $table) {
            $table->primary(['title', 'phone']);
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
        Schema::dropIfExists('files_contact');
    }
}
