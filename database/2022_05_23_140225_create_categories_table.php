<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->default(0)->nullable();
			$table->string('image',150)->nullable();
			$table->enum('published', ['0','1'])->default(1);
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
        });

        Schema::create('category_translations', function (Blueprint $table) {                 
            $table->id();               
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
			$table->string('lang')->index();			
			$table->unique(['category_id','lang']);  
            $table->index(['title','slug']);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        });	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('categories_translations');
    }
}
