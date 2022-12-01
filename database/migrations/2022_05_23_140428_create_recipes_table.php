<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
			$table->string('image',150)->nullable();
			$table->enum('status', ['published', 'unpublished', 'scheduled'])->default('published');
            $table->tinyInteger('cook')->nullable()->comment('preparation time by minutes');
            $table->tinyInteger('servings')->nullable()->comment('by persons');
            $table->enum('featured', ['0','1'])->default(1);
            $table->foreignId('category_id')->nullable()->constrained('recipe_categories')->onDelete('cascade');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        
        Schema::create('recipe_translations', function (Blueprint $table) {                 
            $table->id();               
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
			$table->string('lang')->index();			
			$table->unique(['recipe_id','lang']);              
            $table->foreignId('recipe_id')->constrained('recipes')->onDelete('cascade');
        });	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
        Schema::dropIfExists('recipe_translations');
    }
}
