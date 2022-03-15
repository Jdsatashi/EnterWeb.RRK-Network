<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')
                ->references('id')->on('users')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->Delete('cascade');
            #$table->unsignedBigInteger('category_id');
            $table->string('author');
            $table->text('content');
            $table->string('file');
            $table->timestamps();

            //$table->foreign('category_id')
              //  ->references('category_id')->on('categories')
                //->onDelete('cascade');
            $table->engine = 'InnoDB';
            //$table->index('user_id');
            //$table->index('category_id');
        });
        Schema::table('posts', function(Blueprint $table){
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
