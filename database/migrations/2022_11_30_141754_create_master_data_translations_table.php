<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDataTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_data_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('master_data_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');

            $table->unique(['master_data_id', 'locale']);
            $table->foreign('master_data_id')->references('id')->on('master_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_data_translations');
    }
}
