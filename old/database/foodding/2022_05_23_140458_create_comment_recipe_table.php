<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_recipe', function (Blueprint $table) {
            $table->id();
            $table->text('comment')->nullable();
            $table->integer('rate'); 
            $table->unique(['user_id', 'recipe_id']);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('recipe_id')->constrained('recipes')->onDelete('cascade');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_recipe');
    }
}
