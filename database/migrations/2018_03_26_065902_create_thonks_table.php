<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThonksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thonks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });
        Schema::create('thonks_images', function (Blueprint $table) {
            $table->unsignedInteger('thonk_id');
            $table->foreign('thonk_id')
                ->references('id')
                ->on('thonks')
                ->onDelete('cascade');
        });
        DB::statement("ALTER TABLE thonks_images ADD image MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thonks');
        Schema::dropIfExists('thonks_images');
    }
}
