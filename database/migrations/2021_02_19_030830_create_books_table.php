<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration{
    
    public function up(){
      Schema::create('books', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('category_id');

        $table->string('name');
        $table->text('description');
        $table->string('slug');
        $table->string('ISBN')->unique(); //constraint de SQL
        $table->string('author');
        $table->string('editorial');
        $table->enum('status', ['stock', 'vacio']);
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')
          ->onDelete('cascade')
          ->onUpdate('cascade');

        $table->foreign('category_id')->references('id')->on('categories')
          ->onDelete('cascade')
          ->onUpdate('cascade');
      });
    }

    public function down(){
      Schema::dropIfExists('books');
    }
}
