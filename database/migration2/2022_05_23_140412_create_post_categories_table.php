<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table) {
            $table->unsignedInteger('post_id')->index();
            $table->unsignedInteger('category_id')->index(); 
            // $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            // $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            // $table->unique(['category_id','post_id']);                  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_categories');
    }
}
