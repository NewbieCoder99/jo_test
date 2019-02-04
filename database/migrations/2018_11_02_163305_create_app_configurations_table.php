<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->string('name');
            $table->text('meta_description');
            $table->string('meta_author');
            $table->text('meta_html')->nullable();
            $table->text('about')->nullable();
            $table->text('contact')->nullable();
            $table->text('our_team')->nullable();
            $table->text('services')->nullable();
            $table->text('portfolio')->nullable();
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_configurations');
    }
}
