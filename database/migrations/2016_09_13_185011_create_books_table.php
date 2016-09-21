<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo', 256);
            $table->string('title_eng', 256);
            $table->string('title_srb', 256);
            $table->text('discription_short');
            $table->text('discription_long');
            $table->string('autor', 512);
            $table->integer('price');
            $table->integer('page_num');
            $table->string('deadline', 32);
            $table->string('book_pdf', 256);
            $table->string('book_cover', 32);
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
        Schema::drop('books');
    }
}
